<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['name' => "Nguyễn Hà Trung Hưng", 'email' => 'hungnth@fpt.edu.vn', 'password' => Hash::make('123456')],
            ['name' => 'Trần Hữu Thiện', 'email' => 'thienth@fpt.edu.vn', 'password' => Hash::make('123456')],
        ];
        DB::table('users')->insert($data);
    }
}
