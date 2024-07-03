<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class KhachHangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('khach_hang')->insert([
            [
                'ten_dang_nhap' => 'mailien',
                'mat_khau' => Hash::make('123'),
                'ten_khach_hang' => 'Trần Thị Mai Liên',
                'so_dien_thoai' => '0975789619',
                'email' => 'ttml1707@gmail.com',
                'dia_chi' => 'TP. HCM',
                'anh_dai_dien' => 'default-avatar.jpg',
            ],
            [
                'ten_dang_nhap' => 'quockhang',
                'mat_khau' => Hash::make('123'),
                'ten_khach_hang' => 'Võ Nhật Quốc Khang',
                'so_dien_thoai' => '0123456789',
                'email' => 'vnqk1707@gmail.com',
                'dia_chi' => 'TP. HCM',
                'anh_dai_dien' => 'default-avatar.jpg',
            ],
        ]);
    }
}
