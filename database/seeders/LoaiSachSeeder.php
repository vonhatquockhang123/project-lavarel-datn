<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LoaiSachSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('loai_sach')->insert([
            [
                'id' => 'LS0001',
                'ten_loai_sach' => 'Sách giải trí',
                'slug' => 'sach-giai-tri',
            ],
            [
                'id' => 'LS0002',
                'ten_loai_sach' => 'Sách văn học',
                'slug' => 'sach-van-hoc',
            ],
        ]);
    }
}
