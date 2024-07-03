<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ComboController;
use App\Http\Controllers\KhachHangController;
use App\Http\Controllers\LoaiSachController;
use App\Http\Controllers\NhaXuatBanController;
use App\Http\Controllers\SachController;
use App\Http\Controllers\TacGiaController;
use App\Http\Controllers\PhieuNhapHangController;
use App\Http\Controllers\DanhGiaController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [AdminController::class, 'DangNhap'])->name('dangnhap');
Route::post('/xu-ly-Dang-Nhap', [AdminController::class, 'XuLyDangNhap'])->name('xulydangnhap');

Route::middleware(['auth:admin', 'checkRole:admin'])->group(function () {
    Route::get('/danhsach', [AdminController::class, 'DanhSach'])->name('admin.danhsach');
    Route::get('/themmoi', [AdminController::class, 'ThemMoi'])->name('admin.themmoi');
    Route::post('/themmoi', [AdminController::class, 'XuLyThemMoi'])->name('xuly.themmoi');
    Route::get('/capnhat/{ten_dang_nhap}', [AdminController::class, 'CapNhat'])->name('admin.capnhat');
    Route::post('/capnhat/{ten_dang_nhap}', [AdminController::class, 'XuLyCapNhat'])->name('xuly.capnhat');
    Route::get('/xoa/{ten_dang_nhap}', [AdminController::class, 'Xoa'])->name('xuly.xoa');
    Route::get('/taikhoan', [AdminController::class, 'TaiKhoan'])->name('admin.taikhoan');
    Route::get('/dangxuat',[AdminController::class,'dangXuat'])->name('dangxuat');
    Route::post('/doi-mat-khau', [AdminController::class, 'doiMatKhau'])->name('matkhau.update');
    //khách hàng k dùng đc thì bỏ hết vô đây
});

Route::get('/combo/danh-sach', [ComboController::class, 'DanhSach'])->name('combo.danh-sach');
Route::get('/combo/them-moi', [ComboController::class, 'ThemMoi'])->name('combo.them-moi');
Route::post('/combo/them-moi', [ComboController::class, 'XuLyThemMoi'])->name('combo.xu-ly-them-moi');
Route::get('/combo/cap-nhat/{id}', [ComboController::class, 'CapNhat'])->name('combo.cap-nhat');
Route::post('/combo/cap-nhat/{id}', [ComboController::class, 'XuLyCapNhat'])->name('combo.xu-ly-cap-nhat');
Route::get('/combo/xoa/{id}', [ComboController::class, 'Xoa'])->name('combo.xoa');
Route::get('/combo/tim-kiem',[ComboController::class,'timKiem'])->name('combo.tim-kiem');
//Khách hàng
Route::get('/khach-hang/them-moi', [KhachHangController::class, 'themMoi'])->name('khach-hang.them-moi');
Route::post('/khach-hang/them-moi', [KhachHangController::class, 'xuLyThemMoi'])->name('khach-hang.xu-ly-them-moi');
Route::get('/khach-hang/danh-sach', [KhachHangController::class, 'danhSach'])->name('khach-hang.danh-sach');
Route::get('/khach-hang/cap-nhat/{ten_dang_nhap}', [KhachHangController::class, 'capNhat'])->name('khach-hang.cap-nhat');
Route::put('/khach-hang/cap-nhat/{ten_dang_nhap}', [KhachHangController::class, 'xuLyCapNhat'])->name('khach-hang.xu-ly-cap-nhat');
Route::delete('/khach-hang/xoa/{ten_dang_nhap}', [KhachHangController::class, 'xoa'])->name('khach-hang.xoa');
Route::get('/khach-hang/tim-kiem', [KhachHangController::class, 'timKiem'])->name('khach-hang.tim-kiem');
// Loại sách
Route::get('/loai-sach/them-moi', [LoaiSachController::class, 'themMoi'])->name('loai-sach.them-moi');
Route::post('/loai-sach/xu-ly-them-moi', [LoaiSachController::class, 'xuLyThemMoi'])->name('loai-sach.xu-ly-them-moi');
Route::get('/loai-sach', [LoaiSachController::class, 'danhSach'])->name('loai-sach.danh-sach');
Route::get('/loai-sach/cap-nhat/{id}', [LoaiSachController::class, 'capNhat'])->name('loai-sach.cap-nhat');
Route::post('/loai-sach/xu-ly-cap-nhat/{id}', [LoaiSachController::class, 'xuLyCapNhat'])->name('loai-sach.xu-ly-cap-nhat');
Route::get('/loai-sach/xoa/{id}', [LoaiSachController::class, 'xoa'])->name('loai-sach.xoa');
Route::get('/loai-sach/thung-rac', [LoaiSachController::class, 'thungRac'])->name('loai-sach.thung-rac');
Route::get('/loai-sach/khoi-phuc/{id}', [LoaiSachController::class, 'khoiPhuc'])->name('loai-sach.khoi-phuc');
Route::get('/loai-sach/xoa-vinh-vien/{id}', [LoaiSachController::class, 'xoaVinhVien'])->name('loai-sach.xoa-vinh-vien');
Route::get('/loai-sach/tim-kiem', [LoaiSachController::class, 'timKiem'])->name('loai-sach.tim-kiem');
// Nhà Xuất Bản
Route::get('/nha-xuat-ban', [NhaXuatBanController::class, 'danhSach'])->name('nha-xuat-ban.danh-sach');
Route::get('/nha-xuat-ban/them-moi', [NhaXuatBanController::class, 'themMoi'])->name('nha-xuat-ban.them-moi');
Route::post('/nha-xuat-ban/xu-ly-them-moi', [NhaXuatBanController::class, 'xuLyThemMoi'])->name('nha-xuat-ban.xu-ly-them-moi');
Route::get('/nha-xuat-ban/cap-nhat/{id}', [NhaXuatBanController::class, 'capNhat'])->name('nha-xuat-ban.cap-nhat');
Route::post('/nha-xuat-ban/cap-nhat/{id}', [NhaXuatBanController::class, 'xuLyCapNhat'])->name('nha-xuat-ban.cap-nhat');
Route::delete('/nha-xuat-ban/xoa/{id}', [NhaXuatBanController::class, 'xoa'])->name('nha-xuat-ban.xoa');
Route::get('/nha-xuat-ban/tim-kiem', [NhaXuatBanController::class, 'timKiem'])->name('nha-xuat-ban.tim-kiem');
//sách
Route::prefix('sach')->group(function () {
    Route::get('/', [SachController::class, 'danhSach'])->name('sach.danh-sach');
    Route::get('/them-moi', [SachController::class, 'themMoi'])->name('sach.them-moi');
    Route::post('/them-moi', [SachController::class, 'xuLyThemMoi'])->name('sach.xu-ly-them-moi');
    Route::get('/cap-nhat/{id}', [SachController::class, 'capNhat'])->name('sach.cap-nhat');
    Route::post('/cap-nhat/{id}', [SachController::class, 'xuLyCapNhat'])->name('sach.xu-ly-cap-nhat');
    Route::get('/xoa/{id}', [SachController::class, 'xoa'])->name('sach.xoa');
    Route::get('/tim-kiem',[SachController::class,'timKiem'])->name('sach.tim-kiem');
});
//Tác giả
    Route::get('/tac-gia/danh-sach', [TacGiaController::class, 'danhSach'])->name('tac-gia.danh-sach');
    Route::get('/tac-gia/them-moi', [TacGiaController::class, 'themMoi'])->name('tac-gia.them-moi');
    Route::post('/tac-gia/xu-ly-them-moi', [TacGiaController::class, 'xuLyThemMoi'])->name('tac-gia.xu-ly-them-moi');
    Route::get('/tac-gia/cap-nhat/{id}', [TacGiaController::class, 'capNhat'])->name('tac-gia.cap-nhat');
    Route::post('/tac-gia/cap-nhat/{id}', [TacGiaController::class, 'xuLyCapNhat'])->name('tac-gia.xu-ly-cap-nhat');
    Route::delete('/tac-gia/xoa/{id}', [TacGiaController::class, 'xoa'])->name('tac-gia.xoa');
    Route::get('/tac-gia/tim-kiem', [TacGiaController::class, 'timKiem'])->name('tac-gia.tim-kiem');
//Phiếu nhập hàng
Route::prefix('phieu-nhap-hang')->group(function () {
    Route::get('/', [PhieuNhapHangController::class, 'danhSach'])->name('phieu-nhap-hang.danh-sach');
    Route::get('/them-moi', [PhieuNhapHangController::class, 'themMoi'])->name('phieu-nhap-hang.them-moi');
    Route::post('/xu-ly-them-moi', [PhieuNhapHangController::class, 'xuLyThemMoi'])->name('phieu-nhap-hang.xu-ly-them-moi');
    Route::get('/chi-tiet/{id}', [PhieuNhapHangController::class, 'chiTiet'])->name('phieu-nhap-hang.chi-tiet');
    Route::post('/chi-tiet-phieu-nhap/store', [PhieuNhapHangController::class, 'storeChiTiet'])->name('phieu-nhap-hang.chi-tiet.store');
    Route::get('/xoa/{id}', [PhieuNhapHangController::class, 'xoa'])->name('phieu-nhap-hang.xoa');
    Route::delete('/phieu-nhap-hang/chi-tiet/{id}', [PhieuNhapHangController::class, 'xoaChiTiet'])->name('phieu-nhap-hang.chi-tiet.xoa');
});
//ánh Giá Combo
Route::prefix('danh-gia-combo')->group(function () {
    Route::get('/', [DanhGiaController::class, 'danhSachDanhGiaCombo'])->name('danh-gia-combo.danh-sach');
    Route::get('/them-moi', [DanhGiaController::class, 'themDanhGiaCombo'])->name('danh-gia-combo.them-moi');
    Route::post('/them-moi', [DanhGiaController::class, 'xuLyThemDanhGiaCombo'])->name('danh-gia-combo.xu-ly-them-moi');
    Route::get('/cap-nhat/{id}', [DanhGiaController::class, 'capNhatDanhGiaCombo'])->name('danh-gia-combo.cap-nhat');
    Route::put('/cap-nhat/{id}', [DanhGiaController::class, 'xuLyCapNhatDanhGiaCombo'])->name('danh-gia-combo.xu-ly-cap-nhat');
    Route::delete('/xoa/{id}', [DanhGiaController::class, 'xoaDanhGiaCombo'])->name('danh-gia-combo.xoa');
});
//Đánh Giá Sách
Route::prefix('danh-gia-sach')->group(function () {
    Route::get('/', [DanhGiaController::class, 'danhSachDanhGiaSach'])->name('danh-gia-sach.danh-sach');
    Route::get('/them-moi', [DanhGiaController::class, 'themDanhGiaSach'])->name('danh-gia-sach.them-moi');
    Route::post('/them-moi', [DanhGiaController::class, 'xuLyThemDanhGiaSach'])->name('danh-gia-sach.xu-ly-them-moi');
    Route::get('/cap-nhat/{id}', [DanhGiaController::class, 'capNhatDanhGiaSach'])->name('danh-gia-sach.cap-nhat');
    Route::put('/cap-nhat/{id}', [DanhGiaController::class, 'xuLyCapNhatDanhGiaSach'])->name('danh-gia-sach.xu-ly-cap-nhat');
    Route::delete('/xoa/{id}', [DanhGiaController::class, 'xoaDanhGiaSach'])->name('danh-gia-sach.xoa');
});




Route::get('/thong-tin', [AdminController::class, 'thongtinTaiKhoan'])->name('admin.thongtin');
