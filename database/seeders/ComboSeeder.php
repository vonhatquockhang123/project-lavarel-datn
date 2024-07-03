<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ComboSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('combo')->insert([
        [
            'id' => 'CB0001',
            'ten_combo' => 'Bộ sách giải trí',
            'nha_xuat_ban_id' => 'NXB0001',
            'gia' => 550000,
            'so_luong' => 50,
            'hinh_anh' => null,
            'mo_ta' => 'Bộ sách dùng để giải trí và thư giản',
            'slug' => 'bo-sach-giai-tri',
        ],
        [
            'id' => 'CB0002',
            'ten_combo' => 'Bộ sách văn học Việt Nam',
            'nha_xuat_ban_id' => 'NXB0002',
            'gia' => 550000,
            'so_luong' => 50,
            'hinh_anh' => null,
            'mo_ta' => 'Bộ sách gồm các tác phẩm hay của văn học Việt Nam',
            'slug' => 'bo-sach-van-hoc-viet-nam',
        ],
    ]);
    }
}
