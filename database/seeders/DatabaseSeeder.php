<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            LoaiSachSeeder::class,
            NhaXuatBanSeeder::class,
            SachSeeder::class,
            TacGiaSeeder::class,
            HinhAnhSeeder::class,
            ComboSeeder::class,
            SachTacGiaSeeder::class,
            ComboSachSeeder::class,
            AdminSeeder::class,
            KhachHangSeeder::class,
        ]);
    }
}
