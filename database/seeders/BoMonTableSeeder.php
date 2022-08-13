<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BoMonTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['name' => 'Bộ môn Cơ bản'],
            ['name' => 'Bộ môn Công nghệ thông tin'],
            ['name' => 'Đồ họa Mỹ thuật đa phương tiện'],
            ['name' => 'Bộ môn Kinh tế'],
            ['name' => 'Bộ môn Du lịch - Nhà hàng - Khách sạn'],
            ['name' => 'Bộ môn Điện - Cơ khí'],
            ['name' => 'Bộ môn Thương mại điện tử'],
            ['name' => 'Bộ môn Ứng dụng phần mềm'],
        ];
        DB::table('bo_mon')->insert($data);
    }
}
