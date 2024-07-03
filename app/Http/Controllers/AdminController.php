<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\DangNhapRequest;
use App\Http\Requests\DoiMatKhauRequest;
use App\Models\Admin;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

class AdminController extends Controller
{
    //
    public function DangNhap()
    {
        return view('admin.dangnhap');
    }
    public function XuLyDangNhap(Request $request)
    {
        $admin = Admin::where('ten_dang_nhap', $request->ten_dang_nhap)->first();

        $ten_dang_nhap = $request->ten_dang_nhap;
        $mat_khau = $request->mat_khau;

        if ($admin && Hash::check($mat_khau, $admin->mat_khau)) {
            Auth::guard('admin')->login($admin);
            session(['user_role' => 'admin']);
            return redirect()->route('admin.danhsach')->with('thong_bao', 'ĐĂNG NHẬP THÀNH CÔNG');
        } else {
            return redirect()->route('dangnhap')->with('thong_bao', 'ĐĂNG NHẬP THẤT BẠI');
        }
    }
    private function layThongTinNguoiDung()
    {
        $user = null;
        $role = session('user_role');
        if ($role === 'admin') {
            $user = Auth::guard('admin')->user();
        }

        if (!$user) {
            return redirect()->route('DangNhap')->with('thong_bao', 'Vui lòng đăng nhập để tiếp tục.');
        }

        return compact('user', 'role');
    }
    public function TaiKhoan()
{
    $data = $this->layThongTinNguoiDung();

    if ($data['user']) {
        // Lấy thông tin admin
        $admin = Auth::user();

        // Hợp nhất mảng $data với mảng chứa biến $admin
        $data = array_merge($data, compact('admin'));

        // Trả về view với mảng hợp nhất
        return view('admin.taikhoan', $data);
    } else {
        return redirect()->route('dangnhap')->with('thong_bao', 'Vui lòng đăng nhập để xem thông tin tài khoản.');
    }
}
    public function doiMatKhau(Request $request)
    {
        $data = $this->layThongTinNguoiDung();
        // dd($data);
        // Kiểm tra xem người dùng đã đăng nhập hay chưa
        if (!$data['user']) {
            return redirect()->route('DangNhap')->with('thong_bao', 'Vui lòng đăng nhập để đổi mật khẩu.');
        }

        // dd($data['user']);
        // Kiểm tra mật khẩu hiện tại
        // dd($request->mat_khau);
        if (!Hash::check($request->mat_khau, $data['user']->mat_khau)) {

            return back()->withErrors(['mat_khau' => 'Mật khẩu hiện tại không chính xác']);
        }
   
        // Cập nhật mật khẩu mới
        $data['user']->mat_khau = Hash::make($request->mat_khau_moi);
        $data['user']->save();

        return redirect()->route('admin.taikhoan')->with('thong_bao', 'Đổi mật khẩu thành công');
    }
    public function dangXuat(Request $request)
    {
        Auth::guard(session('user_role'))->logout();
        session()->flush();
        return redirect()->route('dangnhap')->with('thông báo', 'Đăng xuất thành công');
    }
    public function DanhSach()
    {
        $DSAdmin = Admin::all();
        // dd($DSAdmin->ten_dang_nhap)
        return view('admin.danhsach', compact('DSAdmin'));
    }
    public function trangChu()
    {
        $DSAdmin = Admin::all();
        //    dd($DSAdmin->ten_dang_nhap)
        return view('admin.trang-chu', compact('DSAdmin'));
    }
    public function ThemMoi()
    {
        return view('admin.themmoi');
    }
    public function XuLyThemMoi(Request $rq)
    {
        // Kiểm tra xem 'ten_dang_nhap' đã tồn tại chưa
        $existingAdmin = Admin::where('ten_dang_nhap', $rq->ten_dang_nhap)->first();

        if ($existingAdmin) {
            // Nếu tồn tại, trả về thông báo lỗi
            return redirect()->route('admin.danhsach')->with(['thong_bao' => 'Tên đăng nhập đã tồn tại. Vui lòng chọn tên khác.']);
        }
        $admin = new Admin();
        $admin->ten_dang_nhap = $rq->ten_dang_nhap;
        $admin->mat_khau = hash::make($rq->mat_khau);
        $admin->ten_admin = $rq->ten_admin;
        $admin->so_dien_thoai = $rq->so_dien_thoai;
        $admin->email = $rq->email;
        $admin->dia_chi = $rq->dia_chi;
        $admin->trang_thai = $rq->trang_thai;
        $admin->save();

        if ($rq->hasFile('anh_dai_dien')) {
            $path = $rq->file('anh_dai_dien')->store('anh-admin', 'public');

            // Lưu đường dẫn vào cơ sở dữ liệu hoặc sử dụng nó cho mục đích khác
            $admin->anh_dai_dien = $path;
            $admin->save();
        }
        return redirect()->route('admin.danhsach')->with(['thong_bao' => 'Thêm mới thành công']);
    }
    public function CapNhat($ten_dang_nhap)
    {
        $admin = Admin::find($ten_dang_nhap);
        if (empty($ten_dang_nhap)) {
            return 'Sản phẩm không tồn tại';
        }
        return view('admin.capnhat', compact('admin'));
    }
    public function XuLyCapNhat(Request $rq, $ten_dang_nhap)
    {
        $admin = Admin::find($ten_dang_nhap);
        $admin->ten_dang_nhap = $rq->ten_dang_nhap;
        $admin->ten_admin = $rq->ten_admin;
        $admin->so_dien_thoai = $rq->so_dien_thoai;
        $admin->email = $rq->email;
        $admin->dia_chi = $rq->dia_chi;
        $admin->trang_thai = $rq->trang_thai;
        $admin->save();

        $old_anh_dai_dien = $admin->anh_dai_dien;

        // Lưu ảnh mới vào storage
        $path = $rq->file('anh_dai_dien')->store('anh-admin', 'public');

        // Lưu đường dẫn ảnh mới vào cơ sở dữ liệu
        $admin->anh_dai_dien = $path;
        if ($old_anh_dai_dien) {
            Storage::disk('public')->delete($old_anh_dai_dien);
        }
        $admin->save();
        return redirect()->route('admin.danhsach')->with(['thong_bao' => 'Cập nhật thành công']);
    }
    public function Xoa($ten_dang_nhap)
    {
        $admin = Admin::find($ten_dang_nhap);
        if (empty($admin)) {
            return 'Sản phẩm không tồn tại';
        }
        $admin->delete();
        return redirect()->route('admin.danhsach')->with(['thong_bao' => 'Xóa thành công']);
    }
}
