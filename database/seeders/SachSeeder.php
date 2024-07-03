<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SachSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('sach')->insert([
            [
                'id' => 'S0001',
                'loai_sach_id' => 'LS0001',
                'nha_xuat_ban_id' => 'NXB0001',
                'ten_sach' => 'Nhâm nhi Tết Giáp Thìn',
                'kich_co' => null,
                'can_nang' => null,
                'so_trang' => null,
                'ngon_ngu' => null,
                'gia' => 172000,
                'gia_sach_dien_tu' => null,
                'so_luong' => 50,
                'mo_ta' => 'Nhâm nhi Tết Giáp Thìn là ấn phẩm đặc biệt của Nhà xuất bản Kim Đồng. Nhâm nhi Tết đã trở thành món quà ý nghĩa của mỗi gia đình Việt được đón đợi như một phần của Tết.
                Nhâm nhi Tết Giáp Thìn tuyển tập gồm 23 sáng tác Thơ - Văn - Nhạc - Họa chủ đề Xuân và Tết của nhiều tác giả dành riêng cho các em. Điều đặc biệt Nhâm nhi Tết trở thành nơi hội tụ các cây viết nổi tiếng viết cho thiếu nhi nhiều thế hệ. 
                Nhâm nhi tết Giáp Thìn đưa bạn đọc thưởng Xuân khắp mọi miền đất nước: từ chốn thành thị đến miệt vườn, từ miền xuôi lên miền ngược, từ chuyện nay ngược về xưa.',
                'slug' => 'nham-nhi-tet-giap-thin',
            ],
            [
                'id' => 'S0002',
                'loai_sach_id' => 'LS0002',
                'nha_xuat_ban_id' => 'NXB0002',
                'ten_sach' => 'Đất rừng phương Nam',
                'kich_co' => null,
                'can_nang' => null,
                'so_trang' => null,
                'ngon_ngu' => null,
                'gia' => 56700,
                'gia_sach_dien_tu' => null,
                'so_luong' => 50,
                'mo_ta' => 'Được viết bằng trái tim nhạy cảm, tài quan sát tinh tế, hiểu biết sâu sắc và vốn sống dồi dào, 
                Đất rừng phương Nam là một trong những tác phẩm viết về Nam bộ xuất sắc nhất, làm bật lên trọn vẹn vẻ đẹp con người 
                và thiên nhiên nơi đây. Mỗi lần đọc là mỗi lần tình yêu xứ sở được khơi gợi đến nao lòng.',
            ],  'slug' => 'dat-rung-phuong-nam',
        ]);
    }
}
