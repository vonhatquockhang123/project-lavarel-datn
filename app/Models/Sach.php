<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sach extends Model
{
    use HasFactory;
    protected $table='sach';
    public $incrementing = false;
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    public function loaiSach()
    {
        return $this->belongsTo(LoaiSach::class, 'loai_sach_id');
    }

    public function nhaXuatBan()
    {
        return $this->belongsTo(NhaXuatBan::class, 'nha_xuat_ban_id');
    }
    public function chiTietDonHang()
    {
        return $this->hasMany(CTDonHang::class, 'sach_id');
    }
}