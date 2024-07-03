<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Admin extends Authenticatable
{
    use HasFactory;
    protected $table = 'admin'; // Tên bảng nếu khác với 'admins'
    protected $primaryKey = 'ten_dang_nhap'; // Tên cột khóa chính nếu khác với 'id'
    public $incrementing = false; // Nếu khóa chính không tự tăng
    protected $keyType = 'string'; // Kiểu dữ liệu của khóa chính nếu không phải số
    public function phieuNhapHang()
    {
        return $this->belongsTo(PhieuNhapHang::class, 'phieu_nhap_hang_id');
    }
}
