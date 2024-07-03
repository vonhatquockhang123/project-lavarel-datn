<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SachTacGiaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('sach_tac_gia')->insert([
            [
                'id' => 'STG0001',
                'tac_gia_id' => 'TG0001',
                'sach_id' => 'S0001',
            ],
            [
                'id' => 'STG0002',
                'tac_gia_id' => 'TG0002',
                'sach_id' => 'S0002',
            ]
            ]);
    }
}
