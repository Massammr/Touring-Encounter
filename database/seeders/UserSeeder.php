<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use DateTime;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'aaa',
            'email' => 'aaa@gmail.com',
            'password' => Hash::make('password'),
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            'introduction' => 'テスト1',
            'image_url' => 'abcdefg',
        ]);
        DB::table('users')->insert([
            'name' => Str::random(10),
            'email' => Str::random(10).'@gmail.com',
            'password' => Hash::make('password'),
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            'introduction' => 'テスト2',
            'image_url' => 'abcdefg2',
        ]);
        DB::table('users')->insert([
            'name' => Str::random(10),
            'email' => Str::random(10).'@gmail.com',
            'password' => Hash::make('password'),
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            'introduction' => 'テスト3',
            'image_url' => 'abcdefg3',
        ]);
        
        //  DB::table('users')->delete();

        for($i = 0; $i < 100; $i++){
            $data[] =
            [
                'name' => "ユーザー${i}",
                'email' => "user${i}@test.com",
                'password' => Hash::make('password'),
                'created_at' => now(),
                'updated_at' => now()
            ];
        }

        DB::table('users')->insert($data);
        
        // $faker = Faker::create('ja_JP');

        // // ユーザーを50人作成
        // $users = User::factory()->count(50)->create();

        foreach($users as $user) {
            // フォローを追加
            $user->follows()->attach( User::find($faker->numberBetween($min = 1, $max = 50)) );
            // フォロワーを追加
            $user->followers()->attach( User::find($faker->numberBetween($min = 1, $max = 50)) );
        }
    }
}
