<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sach;
use App\Models\LoaiSach;
use App\Models\NhaXuatBan;
use App\Http\Requests\SachRequest;

class SachController extends Controller
{
    public function danhSach()
    {
        $sachs = Sach::paginate(10);
        return view('sach.danh-sach', compact('sachs'));
    }

    public function themMoi()
    {
        $loaiSachs = LoaiSach::all();
        $nhaXuatBans = NhaXuatBan::all();
        return view('sach.them-moi', compact('loaiSachs','nhaXuatBans'));
    }
    public function xuLyThemMoi(SachRequest $request)
    {
        $sach = new Sach();
        $sach->id = $request->id;
        $sach->loai_sach_id = $request->loai_sach_id;
        $sach->nha_xuat_ban_id = $request->nha_xuat_ban_id;
        $sach->ten_sach = $request->ten_sach;
        $sach->ngay_phat_hanh = $request->ngay_phat_hanh;
        $sach->gia = $request->gia;
        $sach->gia_sach_dien_tu = $request->gia_sach_dien_tu;
        $sach->so_luong = $request->so_luong;
        $sach->mo_ta = $request->mo_ta;
        $sach->slug = $request->slug;
        $sach->save();
        return redirect()->route('sach.danh-sach')->with('thong_bao', 'Thêm sách mới thành công!');
    }

    public function capNhat($id)
    {
        $sach = Sach::find($id);
        $loaiSachs = LoaiSach::all();
        $nhaXuatBans = NhaXuatBan::all();
        if (!$sach) {
            return redirect()->route('sach.danh-sach')->with('thong_bao', 'Sách không tồn tại!');
        }
        return view('sach.cap-nhat', compact('sach','loaiSachs','nhaXuatBans'));
    }

    public function xuLyCapNhat(SachRequest $request, $id)
    {
        $sach = Sach::find($id);
        if (!$sach) {
            return redirect()->route('sach.danh-sach')->with('thong_bao', 'Sách không tồn tại!');
        }
        $loai_sach_id = $request->loai_sach_id;
        $nha_xuat_ban_id = $request->nha_xuat_ban_id;
        if (!LoaiSach::find($loai_sach_id)) {
            return redirect()->back()->withErrors(['loai_sach_id' => 'Loại sách không tồn tại']);
        }
        if (!NhaXuatBan::find($nha_xuat_ban_id)) {
            return redirect()->back()->withErrors(['nha_xuat_ban_id' => 'Nhà xuất bản không tồn tại']);
        }
    
        $sach->loai_sach_id = $loai_sach_id;
        $sach->nha_xuat_ban_id = $nha_xuat_ban_id;
        $sach->ten_sach = $request->ten_sach;
        $sach->kich_co = $request->kich_co;
        $sach->can_nang = $request->can_nang;
        $sach->so_trang = $request->so_trang;
        $sach->ngon_ngu = $request->ngon_ngu;
        $sach->ngay_phat_hanh = $request->ngay_phat_hanh;
        $sach->gia = $request->gia;
        $sach->gia_sach_dien_tu = $request->gia_sach_dien_tu;
        $sach->so_luong = $request->so_luong;
        $sach->mo_ta = $request->mo_ta;
        $sach->danh_gia = $request->danh_gia;
        $sach->slug = $request->slug;
        $sach->save();
    
        return redirect()->route('sach.danh-sach')->with('thong_bao', 'Cập nhật sách thành công!');
    }

    public function xoa($id)
    {
        $sach = Sach::findOrFail($id);
        $sach->delete();

        return redirect()->route('sach.danh-sach')->with('success', 'Đã xóa sách thành công');
    }
    public function timKiem(Request $request)
    {
        $searchTerm = $request->input('search');
        $sachs = Sach::where(function ($query) use ($searchTerm) {
            $query->where('ten_sach', 'like', '%' . $searchTerm . '%')
                ->orWhere('loai_sach_id', 'like', '%' . $searchTerm . '%')
                ->orWhere('nha_xuat_ban_id', 'like', '%' . $searchTerm . '%');
        })->paginate(10);

        if ($sachs->isEmpty()) {
            $errorMessage = "Không tìm thấy kết quả phù hợp với từ khóa tìm kiếm: '$searchTerm'";
            return view('sach.danh-sach', compact('sachs', 'searchTerm', 'errorMessage'));
        }

        return view('sach.danh-sach', compact('sachs', 'searchTerm'));
    }
}
