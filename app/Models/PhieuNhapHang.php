<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhieuNhapHang extends Model
{
    use HasFactory;
    protected $table = 'phieu_nhap_sach';
    public $incrementing = false;
    public function admin()
    {
        return $this->belongsTo(Admin::class, 'admin_ten_dang_nhap', 'ten_dang_nhap');
    }
    public function chiTietPhieuNhap()
    {
        return $this->hasMany(CTPhieuNhapSach::class, 'phieu_nhap_sach_id');
    }

}
