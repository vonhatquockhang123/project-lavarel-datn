<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KhuVucVanChuyen extends Model
{
    use HasFactory;
    protected $table='khu_vuc_van_chuyen';
    public $incrementing = false;
    protected $fillable = [
        'id',
        'don_hang_id',
        'ten_khu_vuc',
        'created_at',
        'updated_at',
    ];

    public function donHang()
    {
        return $this->belongsTo(DonHang::class, 'don_hang_id', 'id');
    }
}
