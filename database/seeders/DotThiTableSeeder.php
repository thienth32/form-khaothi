<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DotThiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['name' => "Block 1 - Học kỳ Summer 2022", 'status' => 0],
            ['name' => "Block 2 - Học kỳ Summer 2022", 'status' => 1],
            ['name' => "Block 1 - Học kỳ Fall 2022", 'status' => 0],
            ['name' => "Block 2 - Học kỳ Fall 2022", 'status' => 0],
        ];
        DB::table('dot_thi')->insert($data);
    }
}
