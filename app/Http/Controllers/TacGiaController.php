<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TacGia;
use App\Models\Sach;
use App\Http\Requests\TacGiaRequest;

class TacGiaController extends Controller
{
    public function danhSach()
    {
        $DStacGia = TacGia::paginate(10);
        return view('tac-gia.danh-sach', compact('DStacGia'));
    }

    public function themMoi()
    {
        $list_of_books = Sach::all(); // Lấy danh sách tất cả các sách từ database

        return view('tac-gia.them-moi', compact('list_of_books'));
    }

    public function xuLyThemMoi(TacGiaRequest $request)
    {
        $tacgia = new TacGia();
        $tacgia->id = $request->id; 
        $tacgia->sach_id = $request->sach_id;
        $tacgia->ten_tac_gia = $request->ten_tac_gia;
        $tacgia->ngay_sinh = $request->ngay_sinh;
        $tacgia->quoc_tich = $request->quoc_tich;
        $tacgia->dia_chi = $request->dia_chi;
        $tacgia->save();

    return redirect()->route('tac-gia.danh-sach')->with('thong_bao', 'Thêm tác giả mới thành công!');
    }

    public function capNhat($id)
    {
        $tacgia = TacGia::find($id);
        if (!$tacgia) {
            return redirect()->route('tac-gia.danh-sach')->with('thong_bao', 'Tác giả không tồn tại!');
        }
        return view('tac-gia.cap-nhat', compact('tacgia'));
    }

    public function xuLyCapNhat(TacGiaRequest $request, $id)
    {
        $tacgia = TacGia::find($id);
        if (!$tacgia) {
            return redirect()->route('tac-gia.danh-sach')->with('thong_bao', 'Tác giả không tồn tại!');
        }
        $tacgia->sach_id = $request->sach_id;
        $tacgia->ten_tac_gia = $request->ten_tac_gia;
        $tacgia->ngay_sinh = $request->ngay_sinh;
        $tacgia->quoc_tich = $request->quoc_tich;
        $tacgia->dia_chi = $request->dia_chi;
        $tacgia->save();

        return redirect()->route('tac-gia.danh-sach')->with('thong_bao', 'Cập nhật tác giả thành công!');
    }

    public function xoa($id)
    {
        $tacgia = TacGia::findOrFail($id);
        $tacgia->delete();

        return redirect()->route('tac-gia.danh-sach')->with('success', 'Đã xóa tác giả thành công');
    }
    public function timKiem(Request $request)
    {
        $searchTerm = $request->input('search_name');
        $DStacGia = TacGia::where('ten_tac_gia', 'like', '%' . $searchTerm . '%')
            ->orWhere('sach_id', 'like', '%' . $searchTerm . '%')
            ->paginate(10);

        if ($DStacGia->isEmpty()) {
            $errorMessage = "Không tìm thấy kết quả phù hợp với từ khóa tìm kiếm: '$searchTerm'";
            return view('tac-gia.danh-sach', compact('DStacGia', 'searchTerm', 'errorMessage'));
        }

        return view('tac-gia.danh-sach', compact('DStacGia', 'searchTerm'));
    }
}
