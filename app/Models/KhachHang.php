<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KhachHang extends Model
{
    use HasFactory;
    protected $table = 'khach_hang';
    protected $primaryKey = 'ten_dang_nhap'; 
    public $incrementing = false; 
    protected $keyType = 'string';
    public $timestamps = false;
}