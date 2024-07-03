<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NhaXuatBan;
use App\Http\Requests\NhaXuatBanRequest;

class NhaXuatBanController extends Controller
{
    public function danhSach()
    {
        $nhaXuatBans = NhaXuatBan::paginate(10);
        return view('nha-xuat-ban.danh-sach', compact('nhaXuatBans'));
    }

    public function themMoi()
    {
        return view('nha-xuat-ban.them-moi');
    }

    public function xuLyThemMoi(NhaXuatBanRequest $request)
    {
        $nhaXuatBan = new NhaXuatBan();
        $nhaXuatBan->id = $request->id;
        $nhaXuatBan->ten_nha_xuat_ban = $request->ten_nha_xuat_ban;
        $nhaXuatBan->so_dien_thoai = $request->so_dien_thoai;
        $nhaXuatBan->email = $request->email;
        $nhaXuatBan->dia_chi = $request->dia_chi;
        $nhaXuatBan->mo_ta = $request->mo_ta;
        $nhaXuatBan->save();

        return redirect()->route('nha-xuat-ban.danh-sach')->with('thong_bao', 'Thêm nhà xuất bản thành công!');
    }

    public function capNhat($id)
    {
        $nhaXuatBan = NhaXuatBan::find($id);
        if (!$nhaXuatBan) {
            return redirect()->route('nha-xuat-ban.danh-sach')->with('thong_bao', 'Nhà xuất bản không tồn tại!');
        }
        return view('nha-xuat-ban.cap-nhat', compact('nhaXuatBan'));
    }

    public function xuLyCapNhat(NhaXuatBanRequest $request, $id)
    {
        $nhaXuatBan = NhaXuatBan::find($id);
        if (!$nhaXuatBan) {
            return redirect()->route('nha-xuat-ban.danh-sach')->with('thong_bao', 'Nhà xuất bản không tồn tại!');
        }

        $nhaXuatBan->id = $request->id;
        $nhaXuatBan->ten_nha_xuat_ban = $request->ten_nha_xuat_ban;
        $nhaXuatBan->so_dien_thoai = $request->so_dien_thoai;
        $nhaXuatBan->email = $request->email;
        $nhaXuatBan->dia_chi = $request->dia_chi;
        $nhaXuatBan->mo_ta = $request->mo_ta;
        $nhaXuatBan->save();

        return redirect()->route('nha-xuat-ban.danh-sach')->with('thong_bao', 'Cập nhật nhà xuất bản thành công!');
    }

    public function xoa($id)
    {
         $nhaXuatBan = NhaXuatBan::findOrFail($id);
        $nhaXuatBan->delete();

    return redirect()->route('nha-xuat-ban.danh-sach')->with('success', 'Đã xóa nhà xuất bản thành công');
    }
    public function timKiem(Request $request)
    {
        $search = $request->input('search');
        $nhaXuatBans = NhaXuatBan::where('ten_nha_xuat_ban', 'LIKE', "%{$search}%")
                            ->paginate(10);
                            
        return view('nha-xuat-ban.danh-sach', compact('nhaXuatBans'))->with('search', $search);
    }
}
