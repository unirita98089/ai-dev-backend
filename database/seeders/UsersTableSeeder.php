<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Taro Unirita',
                'email' => 'taro@example.com',
                'password' => bcrypt('password'),
            ],
            [
                'name' => 'Jiro Unirita',
                'email' => 'Jiro@example.com',
                'password' => bcrypt('password'),
            ],
        ]);
    }
}
