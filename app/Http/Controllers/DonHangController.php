<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DonHang;
use App\Models\Admin;
use App\Models\Sach;
use App\Models\Combo;
use App\Models\KhachHang;
use App\Models\CTDonHang;
use Illuminate\Support\Facades\Auth;

class DonHangController extends Controller
{
    public function danhSach()
    {
        $dsDonHang = DonHang::paginate(10);
        
        return view('don-hang.danh-sach', compact('dsDonHang'));
    }

    public function themMoi()
    {
        $dskhachHang = KhachHang::all(); // Lấy danh sách khách hàng
        $dsAdmin = Admin::all(); // Lấy danh sách admin (thay thế bằng model và tên thực tế của admin)
    
        return view('don-hang.them-moi', compact('dskhachHang', 'dsAdmin'));
    }

    public function xuLyThemMoi(Request $request)
    {
            // Kiểm tra xem người dùng đã đăng nhập hay chưa
    if (!Auth::guard('admin')->check()) {
        // Xử lý khi người dùng chưa đăng nhập
        return redirect()->route('dangnhap')->with('error', 'Bạn cần đăng nhập để thực hiện thao tác này.');
    }
        $donHang = new DonHang();
    $donHang->id = $request->id;
    $donHang->khach_hang_ten_dang_nhap = $request->khach_hang_ten_dang_nhap;
    
    // Lấy thông tin admin từ session
    $admin = Auth::guard('admin')->user();
    if ($admin) {
        $donHang->admin_ten_dang_nhap = $admin->ten_dang_nhap;
    } else {
        // Xử lý nếu không tìm thấy thông tin admin
        return redirect()->back()->with('error', 'Không tìm thấy thông tin người dùng.');
    }
    
    $donHang->ten_don_hang = $request->ten_don_hang;
    $donHang->so_dien_thoai = $request->so_dien_thoai;
    $donHang->dia_chi = $request->dia_chi;
    $donHang->tong_tien = $request->tong_tien;
    $donHang->khu_vuc_giao_hang = $request->khu_vuc_giao_hang;
    $donHang->phi_van_chuyen = $request->phi_van_chuyen;
    $donHang->tong_tien_thanh_toan = $request->tong_tien_thanh_toan;
    $donHang->ghi_chu = $request->ghi_chu;
    $donHang->trang_thai = $request->trang_thai;
    
    // Xác định giá trị phương thức thanh toán từ form
    $phuong_thuc_thanh_toan = $request->phuong_thuc_thanh_toan;
    
    // Chỉ gán giá trị hợp lệ cho phương thức thanh toán
    if ($phuong_thuc_thanh_toan >= 1 && $phuong_thuc_thanh_toan <= 3) {
        $donHang->phuong_thuc_thanh_toan = $phuong_thuc_thanh_toan;
    } else {
        // Xử lý khi giá trị không hợp lệ
        return redirect()->back()->with('error', 'Phương thức thanh toán không hợp lệ.');
    }
    
    $donHang->trang_thai_thanh_toan = $request->trang_thai_thanh_toan;
    $donHang->save();

    return redirect()->route('don-hang.danh-sach')->with('thong_bao', 'Thêm đơn hàng thành công!');
    }

    public function xoa($id)
    {
        try {
            $donHang = DonHang::findOrFail($id);
            $donHang->delete();
            return redirect()->route('don-hang.danh-sach')->with('thong_bao', 'Đã xóa đơn hàng thành công');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Không thể xóa đơn hàng. ' . $e->getMessage());
        }
    }
    public function chiTiet($id)
    {
        $donHang = DonHang::findOrFail($id);
        $donHang->load('chiTietDonHang.sach', 'chiTietDonHang.combo');
        $list_of_don_hang= DonHang::all();
        $list_of_books=Sach::all();
        $list_of_combos=Combo::all();
        return view('don-hang.chi-tiet', compact('donHang','list_of_don_hang','list_of_books','list_of_combos'));
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required|string|max:255',
            'don_hang_id' => 'required|string|max:255',
            'sach_id' => 'required|string|max:255',
            'combo_id' => 'nullable|string|max:255',
            'gia' => 'required|numeric',
            'so_luong' => 'required|integer',
        ]);
        $chiTietDonHang = new CTDonHang();
        $chiTietDonHang->id = $validatedData['id'];
        $chiTietDonHang->don_hang_id = $validatedData['don_hang_id'];
        $chiTietDonHang->sach_id = $validatedData['sach_id'];
        $chiTietDonHang->combo_id = $validatedData['combo_id'];
        $chiTietDonHang->gia = $validatedData['gia'];
        $chiTietDonHang->so_luong = $validatedData['so_luong'];

        $chiTietDonHang->save();
        return redirect()->back()->with('success', 'Thêm chi tiết đơn hàng thành công!');
    }

    public function xoaChiTiet($id)
    {
        $chiTietDonHang = CTDonHang::findOrFail($id);
        $chiTietDonHang->delete();
        return redirect()->back()->with('success', 'Chi tiết đơn hàng đã được xóa.');
    }

    public function timKiem(Request $request)
    {
        $search = $request->input('search');
        $donHangs = DonHang::where('ten_don_hang', 'LIKE', "%{$search}%")
                            ->orWhere('khach_hang_ten_dang_nhap', 'LIKE', "%{$search}%")
                            ->orWhere('admin_ten_dang_nhap', 'LIKE', "%{$search}%")
                            ->paginate(10);
    
        if (empty($search)) {
            $search = '';
        }
    
        return view('don-hang.danh-sach', compact('donHangs', 'search'));
    }
}
