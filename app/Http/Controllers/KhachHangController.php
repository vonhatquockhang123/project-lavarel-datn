<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KhachHang;
use App\Models\HinhAnh;
use App\Http\Requests\KhachHangRequest;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\ComboRequest;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class KhachHangController extends Controller
{
    public function themMoi()
    {
        return view('khach-hang.them-moi');
    }

    public function xuLyThemMoi(Request $request)
    {
        $khachHang = new KhachHang();
        $khachHang->ten_dang_nhap = $request->ten_dang_nhap;
        $khachHang->mat_khau = Hash::make($request->mat_khau);
        $khachHang->ten_khach_hang = $request->ten_khach_hang;
        $khachHang->so_dien_thoai = $request->so_dien_thoai;
        $khachHang->email = $request->email;
        $khachHang->dia_chi = $request->dia_chi;

        if ($request->hasFile('anh_dai_dien')) {
            $path = $request->file('anh_dai_dien')->store('anh-khach-hang', 'public');
    
            // Lưu đường dẫn vào cơ sở dữ liệu hoặc sử dụng nó cho mục đích khác
            $khachHang->anh_dai_dien = $path;
            $khachHang->save();
        }

        $khachHang->trang_thai = $request->trang_thai;
        $khachHang->save();

        return redirect()->route('khach-hang.danh-sach')->with(['thong_bao' => "Thêm khách hàng {$khachHang->ten_khach_hang} thành công!"]);
    }
    public function danhSach()
    {
        $dskhachHang = KhachHang::all();
        return view('khach-hang.danh-sach', compact('dskhachHang'));
    }

    public function capNhat($ten_dang_nhap)
    {
        $khachHang = KhachHang::find($ten_dang_nhap);

        if (empty($khachHang)) {
            return redirect()->back()->withErrors(['error' => 'Khách hàng không tồn tại']);
        }

        return view('khach-hang.cap-nhat', compact('khachHang'));
    }

    public function xuLyCapNhat(KhachHangRequest $request, $ten_dang_nhap)
{
    // Tìm kiếm khách hàng theo tên đăng nhập
    $khachHang = KhachHang::where('ten_dang_nhap', $ten_dang_nhap)->first();

    if (empty($khachHang)) {
        return redirect()->back()->withErrors(['error' => 'Khách hàng không tồn tại']);
    }
    $khachHang->ten_dang_nhap = $request->ten_dang_nhap;
    // Cập nhật thông tin khách hàng từ request
    // if ($request->has('mat_khau')) {
    //     $khachHang->mat_khau = Hash::make($request->mat_khau);
    // }
    $khachHang->ten_khach_hang = $request->ten_khach_hang;
    $khachHang->so_dien_thoai = $request->so_dien_thoai;
    $khachHang->email = $request->email;
    $khachHang->dia_chi = $request->dia_chi;

    // Xử lý upload và lưu đường dẫn hình ảnh
    if ($request->hasFile('hinh_anh')) {
        $path = $request->file('hinh_anh')->store('anh-khach-hang', 'public');
        $khachHang->hinh_anh = $path;

        // Xóa hình ảnh cũ nếu có
        if ($khachHang->anh_dai_dien) {
            Storage::disk('public')->delete($khachHang->anh_dai_dien);
        }
    }

    // Lưu lại thông tin cập nhật và trạng thái
    $khachHang->trang_thai = $request->has('trang_thai') ? 1 : 0;
    $khachHang->save();

    return redirect()->route('khach-hang.danh-sach')->with(['thong_bao' => "Cập nhật khách hàng {$khachHang->ten_khach_hang} thành công!"]);
}


    public function xoa($ten_dang_nhap)
    {
        $khachHang = KhachHang::find($ten_dang_nhap);
        if (empty($khachHang)) {
            return 'Sản phẩm không tồn tại';
        }
        // $oldImage = HinhAnh::where('admin_ten_dang_nhap', $admin->ten_dang_nhap)->delete();
        $khachHang->delete();
        return redirect()->route('khach-hang.danh-sach')->with(['thong_bao' => 'Xóa thành công']);
    }

    public function timKiem(Request $request)
    {
        $reQuest = $request->search_name;
        $dskhachHang = KhachHang::where('ten_khach_hang', 'like', '%' . $reQuest . '%')->get();

        if ($dskhachHang->isEmpty()) {
            $errorMessage = "Tên Khách hàng không tồn tại với từ khóa tìm kiếm: '$reQuest'";
            return view('khach-hang.danh-sach', compact('dskhachHang', 'reQuest', 'errorMessage'));
        }

        return view('khach-hang.danh-sach', compact('dskhachHang', 'reQuest'));
    }
}
