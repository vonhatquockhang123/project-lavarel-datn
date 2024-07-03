<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CTPhieuNhapSach extends Model
{
    use HasFactory;

    protected $table = 'chi_tiet_phieu_nhap_sach';
    public $incrementing = false; 
    public function getGiaNhapFormattedAttribute()
    {
        return number_format($this->gia_nhap, 0, ',', '.');
    }

    public function getGiaBanFormattedAttribute()
    {
        return number_format($this->gia_ban, 0, ',', '.');
    }
    public function sach()
    {
        return $this->belongsTo(Sach::class, 'sach_id');
    }

    public function combo()
    {
        return $this->belongsTo(Combo::class, 'combo_id');
    }
}
