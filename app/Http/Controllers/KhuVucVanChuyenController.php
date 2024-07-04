<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KhuVucVanChuyen;
use App\Models\DonHang;

class KhuVucVanChuyenController extends Controller
{
    public function danhSach()
    {
        $dsKhuVuc = KhuVucVanChuyen::paginate(10);
        return view('khu-vuc-van-chuyen.danh-sach', compact('dsKhuVuc'));
    }
    public function themMoi()
    {
        // Lấy danh sách đơn hàng để hiển thị trong select box
        $dsDonHang = DonHang::all(); // Thay đổi logic này nếu cần phù hợp với việc lựa chọn đơn hàng
        
        return view('khu-vuc-van-chuyen.them-moi', compact('dsDonHang'));
    }

    public function xuLyThemMoi(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required|string|max:255', // Thêm trường id vào validation
            'don_hang_id' => 'required',
            'ten_khu_vuc' => 'required|string|max:255',
        ]);

        $khuVuc = new KhuVucVanChuyen();
        $khuVuc->id = $validatedData['id']; // Sử dụng giá trị ID từ form
        $khuVuc->don_hang_id = $validatedData['don_hang_id'];
        $khuVuc->ten_khu_vuc = $validatedData['ten_khu_vuc'];

        $khuVuc->save();

        return redirect()->route('khu-vuc-van-chuyen.danh-sach')->with('thong_bao', 'Thêm mới khu vực vận chuyển thành công!');
    }
}
