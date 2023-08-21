<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('posts')->insert([
                'user_id' => 1,
                'title' => '命名の心得',
                'body' => '命名はデータを基準に考える',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
         ]);
         DB::table('posts')->insert([
                'user_id' => 2,
                'title' => '命名の心得2',
                'body' => '命名はデータを基準に考える2',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
         ]);
         DB::table('posts')->insert([
                'user_id' => 3,
                'title' => '命名の心得3',
                'body' => '命名はデータを基準に考える3',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
         ]);
         DB::table('posts')->insert([
                'user_id' => 1,
                'title' => '命名の心得4',
                'body' => '命名はデータを基準に考える4',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
         ]);
         DB::table('posts')->insert([
                'user_id' => 1,
                'title' => '命名の心得5',
                'body' => '命名はデータを基準に考える5',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
         ]);
         DB::table('posts')->insert([
                'user_id' => 2,
                'title' => '命名の心得6',
                'body' => '命名はデータを基準に考える6',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
         ]);
    }
}
