<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Combo extends Model
{
    use HasFactory;
    protected $table='combo';
    public $incrementing = false;
    public function nhaXuatBan()
    {
        return $this->belongsTo(NhaXuatBan::class);
    }
    public function chiTietDonHang()
    {
        return $this->hasMany(CTDonHang::class, 'combo_id');
    }
}
