<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NhaXuatBan extends Model
{
    use HasFactory;
    protected $table='nha_xuat_ban';
    public $incrementing = false;
    public function combo()
    {
        return $this->hasMany(Combo::class);
    }
    public function loaiSach()
    {
        return $this->hasMany(LoaiSach::class);
    }
    public function phieuNhapHang()
    {
        return $this->belongsTo(PhieuNhapHang::class, 'phieu_nhap_hang_id');
    }
}
