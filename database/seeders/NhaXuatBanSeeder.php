<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NhaXuatBanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('nha_xuat_ban')->insert([
            [
                'id' => 'NXB0001',
                'ten_nha_xuat_ban' => 'NXB Kim Đồng',
                'so_dien_thoai' => '0975789619',
                'email' => 'kd01@gmail.com',
                'dia_chi' => 'Hà Nội',
                'mo_ta' => null,
            ],
            [
                'id' => 'NXB0002',
                'ten_nha_xuat_ban' => 'NXB Giáo Dục',
                'so_dien_thoai' => '0989795789',
                'email' => 'gd01@gmail.com',
                'dia_chi' => 'Hà Nội',
                'mo_ta' => null,
            ],
        ]);
    }
}
