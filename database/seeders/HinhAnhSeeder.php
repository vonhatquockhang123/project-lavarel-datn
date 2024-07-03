<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HinhAnhSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('hinh_anh')->insert([
            [
                'id' => 'HA0001',
                'sach_id' => 'S0001',
                'ten' => null,
            ],
            [
                'id' => 'HA0002',
                'sach_id' => 'S0002',
                'ten' => null,
            ],
        ]);
    }
}
