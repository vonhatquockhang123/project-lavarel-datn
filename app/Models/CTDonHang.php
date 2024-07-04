<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CTDonHang extends Model
{
    use HasFactory;
    protected $table='chi_tiet_don_hang';
    public $incrementing = false; 
    protected $fillable = [
        'don_hang_id',
        'sach_id',
        'combo_id',
        'gia',
        'so_luong',
    ];

    public function donHang()
    {
        return $this->belongsTo(DonHang::class, 'don_hang_id');
    }

    public function sach()
    {
        return $this->belongsTo(Sach::class, 'sach_id', 'id');
    }
    public function combo()
    {
        return $this->belongsTo(Combo::class, 'combo_id', 'id');
    }
}
