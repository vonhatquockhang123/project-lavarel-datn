<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DanhGiaCombo extends Model
{
    use HasFactory;
    protected $table = 'danh_gia_combo';
    protected $fillable = ['khach_hang_id', 'combo_id', 'danh_gia', 'noi_dung'];

    public function combo()
    {
        return $this->belongsTo(Combo::class, 'combo_id');
    }

    public function khachHang()
    {
        return $this->belongsTo(KhachHang::class, 'khach_hang_id');
    }
}
