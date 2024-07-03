<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TacGiaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tac_gia')->insert([
            [
                'id' => 'TG0001',
                'sach_id' => 'S0001',
                'ten_tac_gia' => 'Dale Carnegie',
                'ngay_sinh' => '21/11/1988',
                'dia_chi' => 'Maryville, Missouri, Hoa Kỳ',
            ],
            [
                'id' => 'TG0002',
                'sach_id' => 'S0002',
                'ten_tac_gia' => 'Nguyễn Nhật Ánh',
                'ngay_sinh' => '07/05/1955',
                'quoc_tich' => 'Việt Nam',
                'dia_chi' => 'Thăng Bình, Quảng Nam, Việt Nam',
            ],
        ]);
    }
}
