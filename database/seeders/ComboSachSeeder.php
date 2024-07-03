<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ComboSachSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('combo_sach')->insert([
            [
                'id' => 'CBS0001',
                'sach_id' => 'S0001',
                'combo_id' => 'CB0001',
            ],
            [
                'id' => 'CBS0002',
                'sach_id' => 'S0002',
                'combo_id' => 'CB0002',
            ],
        ]);
    }
}
