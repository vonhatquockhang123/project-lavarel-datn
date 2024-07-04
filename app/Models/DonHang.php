<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DonHang extends Model
{
    use HasFactory;
    protected $table='don_hang';
    protected $primaryKey = 'id';
    const TRANG_THAI_CHO_XU_LY = 1; 
    const TRANG_THAI_DANG_GIAO =2;
    const TRANG_THAI_HOAN_THANH = 3;
    const TRANG_THAI_DA_HUY = 4;
    public $incrementing = false; 

    protected $fillable = [
        'khach_hang_ten_dang_nhap',
        'admin_ten_dang_nhap',
        'ten_don_hang',
        'so_dien_thoai',
        'dia_chi',
        'tong_tien',
        'khu_vuc_giao_hang',
        'phi_van_chuyen',
        'tong_tien_thanh_toan',
        'ghi_chu',
        'trang_thai',
        'phuong_thuc_thanh_toan',
        'trang_thai_thanh_toan',
    ];
    public function admin()
    {
        return $this->belongsTo(Admin::class, 'admin_ten_dang_nhap', 'ten_dang_nhap');
    }
    public function chiTietDonHang()
    {
        return $this->hasMany(CTDonHang::class, 'don_hang_id');
    }
    public function khuVucVanChuyen()
    {
        return $this->hasMany(KhuVucVanChuyen::class, 'don_hang_id', 'id');
    }
}
