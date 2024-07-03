<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('admin')->insert([
            [
                'ten_dang_nhap' => 'quockhang',
                'mat_khau' => Hash::make('123'),
                'ten_admin' => 'Võ Nhật Quốc Khang',
                'so_dien_thoai' => '0123456789',
                'email' => 'vnqk1707@gmail.com',
                'dia_chi' => 'TP. HCM',
                'anh_dai_dien' => 'default-avatar.jpg',
            ]
        ]);
    }
}
