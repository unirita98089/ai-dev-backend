<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TodoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('todos')->insert([
            [
                'title' => 'ToDo 1',
                'description' => 'ToDo 1 description',
                'date' => '2023-09-01',
                'status' => '未開始',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'ToDo 2',
                'description' => 'ToDo 2 description',
                'date' => '2023-09-02',
                'status' => '未開始',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'ToDo 3',
                'description' => 'ToDo 3 description',
                'date' => '2023-08-02',
                'status' => '進行中',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'ToDo 4',
                'description' => 'ToDo 4 description',
                'date' => '2023-08-01',
                'status' => '進行中',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'ToDo 5',
                'description' => 'ToDo 5 description',
                'date' => '2023-06-02',
                'status' => '完了',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'ToDo 6',
                'description' => 'ToDo 6 description',
                'date' => '2023-06-01',
                'status' => '完了',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
