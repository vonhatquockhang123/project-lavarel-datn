<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Combo;
use App\Models\NhaXuatBan;
use App\Http\Requests\ComboRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ComboController extends Controller
{
    public function danhSach()
    {
        $DSCombo = Combo::all();
        return view('combo.danh-sach', compact('DSCombo'));
    }
    public function themMoi()
    {
        $nhaXuatBans = NhaXuatBan::all(); // Lấy tất cả nhà xuất bản
        return view('combo.them-moi', compact('nhaXuatBans'));
    }
    public function xuLyThemMoi(ComboRequest $request)
    {
        $combo = new Combo();
        $combo->id = $request->id;
        $combo->ten_combo = $request->ten_combo;
        $combo->nha_xuat_ban_id = $request->nha_xuat_ban_id;
        $combo->gia = $request->gia;
        $combo->so_luong = $request->so_luong;
        $combo->mo_ta = $request->mo_ta;
        $combo->slug = $request->slug;
        $combo->save();

        if ($request->hasFile('hinh_anh')) {
            $path = $request->file('hinh_anh')->store('anh-combo', 'public');
            $combo->hinh_anh = $path;
            $combo->save();
            return redirect()->route('combo.danh-sach')->with(['thong_bao' => 'Thêm mới thành công']);
            return redirect()->route('combo.danh-sach')->with(['thong_bao' => 'Đã xảy ra lỗi. Vui lòng thử lại.']);
        }
    }

    public function capNhat($id)
    {
        $combo = Combo::find($id);
        $nhaXuatBans = NhaXuatBan::all(); // Lấy tất cả nhà xuất bản
        if (empty($id)) {
            return 'Sản phẩm không tồn tại';
        }
        return view('combo.cap-nhat', compact('nhaXuatBans','combo'));
    }
    public function xuLyCapNhat(Request $request, $id)
    {
        $combo = Combo::find($id);
        $combo->ten_combo = $request->ten_combo;
        $combo->nha_xuat_ban_id = $request->nha_xuat_ban_id;
        $combo->gia = $request->gia;
        $combo->so_luong = $request->so_luong;
        $combo->mo_ta = $request->mo_ta;
        $combo->slug = $request->slug;
        $combo->save();
        $old_hinh_anh = $combo->hinh_anh;

        if ($request->hasFile('hinh_anh')) {
            $path = $request->file('hinh_anh')->store('anh-combo', 'public');
            $combo->hinh_anh = $path;
        }

        // Lưu đường dẫn ảnh mới vào cơ sở dữ liệu
        if ($old_hinh_anh) {
            Storage::disk('public')->delete($old_hinh_anh);
        }
        $combo->save();

        return redirect()->route('combo.danh-sach')->with(['thong_bao' => 'Cập nhật thành công']);
    }
    public function xoa($id)
    {
        $combo = Combo::find($id);
        if (empty($combo)) {
            return 'Sản phẩm không tồn tại';
        }
        $combo->delete();
        return redirect()->route('combo.danh-sach')->with(['thong_bao' => 'Xóa thành công']);
    }
    public function timKiem(Request $request)
    {
        $searchTerm = $request->input('search_name');

        $DSCombo = Combo::where('ten_combo', 'like', '%' . $searchTerm . '%')->paginate(10);

        if ($DSCombo->isEmpty()) {
            $errorMessage = "Không tìm thấy kết quả phù hợp với từ khóa tìm kiếm: '$searchTerm'";
            return view('combo.danh-sach', compact('DSCombo', 'searchTerm', 'errorMessage'));
        }

        return view('combo.danh-sach', compact('DSCombo', 'searchTerm'));
    }
}
