<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PhieuNhapHang;
use App\Models\Admin;
use App\Models\NhaXuatBan;
use App\Models\Sach;
use App\Models\Combo;
use App\Models\CTPhieuNhapSach;
use App\Http\Requests\PhieuNhapHangRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PhieuNhapHangController extends Controller
{
    public function danhSach()
    {
        $DSPhieuNhapHang = PhieuNhapHang::with('admin')->paginate(10);
        return view('phieu-nhap-hang.danh-sach', compact('DSPhieuNhapHang'));
    }

    public function themMoi()
    {
        $nhaXuatBans = NhaXuatBan::all();
        $admins = Admin::all();
        return view('phieu-nhap-hang.them-moi', compact('nhaXuatBans', 'admins'));
    }

    public function xuLyThemMoi(PhieuNhapHangRequest $request)
    {
        // Kiểm tra xem người dùng đã đăng nhập hay chưa
    if (!Auth::guard('admin')->check()) {
        // Xử lý khi người dùng chưa đăng nhập
        return redirect()->route('dangnhap')->with('error', 'Bạn cần đăng nhập để thực hiện thao tác này.');
    }

    // Người dùng đã đăng nhập, tiếp tục xử lý thêm mới phiếu nhập hàng
    $phieuNhapHang = new PhieuNhapHang();
    $phieuNhapHang->id = $request->id;
    $phieuNhapHang->nha_xuat_ban_id = $request->nha_xuat_ban_id;
    
    // Lấy thông tin admin từ session
    $admin = Auth::guard('admin')->user();
    if ($admin) {
        $phieuNhapHang->admin_ten_dang_nhap = $admin->ten_dang_nhap;
    } else {
        // Xử lý nếu không tìm thấy thông tin admin
        return redirect()->back()->with('error', 'Không tìm thấy thông tin người dùng.');
    }

    $phieuNhapHang->tong_tien = $request->tong_tien;
    $phieuNhapHang->ghi_chu = $request->ghi_chu;
    $phieuNhapHang->trang_thai = $request->trang_thai;
    $phieuNhapHang->save();

    return redirect()->route('phieu-nhap-hang.danh-sach')->with('thong_bao', 'Thêm phiếu nhập hàng mới thành công!');
    }

    public function chiTiet($id)
    {
        $phieuNhapHang = PhieuNhapHang::with('chiTietPhieuNhap.sach', 'chiTietPhieuNhap.combo')->findOrFail($id);
        $list_of_books = Sach::all();
        $list_of_combos = Combo::all();
        $list_of_phieu_nhap_sach = PhieuNhapHang::pluck('id', 'id');
        return view('phieu-nhap-hang.chi-tiet', compact('phieuNhapHang', 'list_of_books', 'list_of_combos', 'list_of_phieu_nhap_sach'));
    }
    public function storeChiTiet(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required|string|max:255', // Thêm trường id vào validation
            'phieu_nhap_sach_id' => 'required|string|max:255',
            'sach_id' => 'required|string|max:255',
            'combo_id' => 'nullable|string|max:255',
            'gia_nhap' => 'required|numeric',
            'gia_ban' => 'required|numeric',
            'so_luong' => 'required|integer',
        ]);
    
        $chiTietPhieuNhap = new CTPhieuNhapSach();
        $chiTietPhieuNhap->id = $validatedData['id']; // Sử dụng giá trị ID từ form
        $chiTietPhieuNhap->phieu_nhap_sach_id = $validatedData['phieu_nhap_sach_id'];
        $chiTietPhieuNhap->sach_id = $validatedData['sach_id'];
        $chiTietPhieuNhap->combo_id = $validatedData['combo_id'];
        $chiTietPhieuNhap->gia_nhap = $validatedData['gia_nhap'];
        $chiTietPhieuNhap->gia_ban = $validatedData['gia_ban'];
        $chiTietPhieuNhap->so_luong = $validatedData['so_luong'];
        $chiTietPhieuNhap->save();
    
        return redirect()->back()->with('success', 'Thêm chi tiết phiếu nhập hàng thành công!');
    }
    public function xoaChiTiet($id)
    {
        CTPhieuNhapSach::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Đã xóa chi tiết phiếu nhập hàng thành công');
    }
    public function xoa($id)
    {
        $phieuNhapHang = PhieuNhapHang::findOrFail($id);
        $phieuNhapHang->delete();

        return redirect()->route('phieu-nhap-hang.danh-sach')->with('success', 'Đã xóa phiếu nhập hàng thành công');
    }
}
