<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LoaiSach;
use App\Http\Requests\LoaiSachRequest;

class LoaiSachController extends Controller
{
    public function themMoi()
    {
        return view('loai-sach.them-moi');
    }

    public function xuLyThemMoi(LoaiSachRequest $request)
    {
        $loaiSach = new LoaiSach();
        $loaiSach->id=$request->id;
        $loaiSach->ten_loai_sach = $request->ten_loai_sach;
        $loaiSach->slug = $request->slug;
        $loaiSach->save();

        return redirect()->route('loai-sach.danh-sach')->with(['thong_bao' => "Thêm loại sách {$loaiSach->ten_loai_sach} thành công!"]);
    }

    public function danhSach()
    {
        $dsLoaiSach = LoaiSach::paginate(10);
        return view('loai-sach.danh-sach', compact('dsLoaiSach'));
    }

    public function capNhat($id)
    {
        $loaiSach = LoaiSach::find($id);
        if (empty($loaiSach)) {
            return redirect()->route('loai-sach.danh-sach')->with(['thong_bao' => "Loại sách không tồn tại!"]);
        }

        return view('loai-sach.cap-nhat', compact('loaiSach'));
    }

    public function xuLyCapNhat(LoaiSachRequest $request, $id)
    {
        $loaiSach = LoaiSach::find($id);
        if (empty($loaiSach)) {
            return redirect()->route('loai-sach.danh-sach')->with(['thong_bao' => "Loại sách không tồn tại!"]);
        }

        $loaiSach->ten_loai_sach = $request->ten_loai_sach;
        $loaiSach->slug = $request->slug;
        $loaiSach->save();

        return redirect()->route('loai-sach.danh-sach')->with(['thong_bao' => "Cập nhật loại sách {$loaiSach->ten_loai_sach} thành công!"]);
    }

    public function xoa($id)
    {
        $loaiSach = LoaiSach::find($id);
        if (empty($loaiSach)) {
            return redirect()->route('loai-sach.danh-sach')->with(['thong_bao' => "Loại sách không tồn tại!"]);
        }

        $loaiSach->delete();

        return redirect()->route('loai-sach.danh-sach')->with(['thong_bao' => "Xóa loại sách {$loaiSach->ten_loai_sach} thành công!"]);
    }

    public function timKiem(Request $request)
    {
        $search = $request->get('search');
        $dsLoaiSach = LoaiSach::where('ten_loai_sach', 'like', '%' . $search . '%')
                              ->orWhere('slug', 'like', '%' . $search . '%')
                              ->paginate(10);
    
        if ($dsLoaiSach->isEmpty()) {
            $errorMessage = "Không tìm thấy loại sách với từ khóa: '$search'";
            return view('loai-sach.danh-sach', compact('dsLoaiSach', 'search', 'errorMessage'));
        }
    
        return view('loai-sach.danh-sach', compact('dsLoaiSach', 'search'));
    }
}
