<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DanhGiaSach extends Model
{
    use HasFactory;
    protected $table = 'danh_gia_sach';
    protected $fillable = ['khach_hang_id', 'sach_id', 'danh_gia', 'noi_dung'];
    public function sach()
    {
        return $this->belongsTo(Sach::class, 'sach_id');
    }

    public function khachHang()
    {
        return $this->belongsTo(KhachHang::class, 'khach_hang_id');
    }
}
