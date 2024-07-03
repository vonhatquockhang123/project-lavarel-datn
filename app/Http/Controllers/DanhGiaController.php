<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KhachHang;
use App\Models\Sach;
use App\Models\Combo;
use App\Models\DanhGiaSach;
use App\Models\DanhGiaCombo;
use App\Http\Requests\DanhGiaComboRequest;
use App\Http\Requests\DanhGiaSachRequest;

class DanhGiaController extends Controller
{
    public function danhSachDanhGiaCombo()
    {
        $danhGiaCombos = DanhGiaCombo::paginate(10);
        return view('danh-gia-combo.danh-sach', compact('danhGiaCombos'));
    }

    public function danhSachDanhGiaSach()
    {
        $danhGiaSachs = DanhGiaSach::paginate(10);
        return view('danh-gia-sach.danh-sach', compact('danhGiaSachs'));
    }

    public function themDanhGiaCombo()
    {
        $dskhachHang = KhachHang::all(); 
        $combos = Combo::all();
        return view('danh-gia-combo.them-moi', compact('dskhachHang', 'combos'));
    }

    public function themDanhGiaSach()
    {
        $dskhachHang = KhachHang::all(); 
        $sachs = Sach::all(); 
        return view('danh-gia-sach.them-moi', compact('dskhachHang', 'sachs'));
    }

    public function xuLyThemDanhGiaCombo(DanhGiaComboRequest $request)
    {
        $danhGiaCombo = new DanhGiaCombo();
        $danhGiaCombo->khach_hang_id = $request->khach_hang_id;
        $danhGiaCombo->combo_id = $request->combo_id;
        $danhGiaCombo->danh_gia = $request->danh_gia;
        $danhGiaCombo->noi_dung = $request->noi_dung;
        $danhGiaCombo->save();

        return redirect()->route('danh-gia-combo.danh-sach')->with('thong_bao', 'Thêm đánh giá combo thành công!');
    }

    public function xuLyThemDanhGiaSach(DanhGiaSachRequest $request)
    {
        $danhGiaSach = new DanhGiaSach();
        $danhGiaSach->khach_hang_id = $request->khach_hang_id;
        $danhGiaSach->sach_id = $request->sach_id;
        $danhGiaSach->danh_gia = $request->danh_gia;
        $danhGiaSach->noi_dung = $request->noi_dung;
        $danhGiaSach->save();

        return redirect()->route('danh-gia-sach.danh-sach')->with('thong_bao', 'Thêm đánh giá sách thành công!');
    }

    public function xoaDanhGiaCombo($id)
    {
        $danhGiaCombo = DanhGiaCombo::findOrFail($id);
        $danhGiaCombo->delete();

        return redirect()->route('danh-gia-combo.danh-sach')->with('success', 'Đã xóa đánh giá combo thành công');
    }

    public function xoaDanhGiaSach($id)
    {
        $danhGiaSach = DanhGiaSach::findOrFail($id);
        $danhGiaSach->delete();

        return redirect()->route('danh-gia-sach.danh-sach')->with('success', 'Đã xóa đánh giá sách thành công');
    }
}
