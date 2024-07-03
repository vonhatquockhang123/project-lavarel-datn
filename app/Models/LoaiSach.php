<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LoaiSach extends Model
{
    use HasFactory;
    protected $table='loai_sach';
    protected $fillable = [
        'id',
        'ten_loai_sach',
        'slug'
    ];

    protected $keyType = 'string';
    public $incrementing = false;

    protected $dates = ['deleted_at'];
    public function sach()
    {
        return $this->hasMany(Sach::class);
    }
}
