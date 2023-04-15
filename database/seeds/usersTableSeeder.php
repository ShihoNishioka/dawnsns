<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class usersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'username' => 'aaaaa',
                'mail' => 'aaaaa@mail.com',
                'password' => Hash::make('aaaaa12345'),
                'bio' => 'こんにちは!',
                'created_at' => '2023-04-08 14:31:01',
                'updated_at' => '2023-04-08 14:50:20',
            ],
            [
                'username' => 'bbbbb',
                'mail' => 'bbbbb@mail.com',
                'password' => Hash::make('bbbbb12345'),
                'bio' => 'Hello!',
                'created_at' => '2023-04-08 14:32:02',
                'updated_at' => '2023-04-08 14:51:21',
            ],
            [
                'username' => 'ccccc',
                'mail' => 'ccccc@mail.com',
                'password' => Hash::make('ccccc12345'),
                'bio' => 'あんにょん!',
                'created_at' => '2023-04-08 14:33:03',
                'updated_at' => '2023-04-08 14:52:22',
            ],
            [
                'username' => 'ddddd',
                'mail' => 'ddddd@mail.com',
                'password' => Hash::make('ddddd12345'),
                'bio' => 'ボンジュール!',
                'created_at' => '2023-04-08 14:34:04',
                'updated_at' => '2023-04-08 14:53:23',
            ],
            [
                'username' => 'eeeee',
                'mail' => 'eeeee@mail.com',
                'password' => Hash::make('eeeee12345'),
                'bio' => '你好!',
                'created_at' => '2023-04-08 14:35:05',
                'updated_at' => '2023-04-08 14:54:24',
            ],
            [
                'username' => 'fffff',
                'mail' => 'fffff@mail.com',
                'password' => Hash::make('fffff12345'),
                'bio' => 'ブエノスディアス!',
                'created_at' => '2023-04-08 14:36:06',
                'updated_at' => '2023-04-08 14:55:25',
            ],
            [
                'username' => 'ggggg',
                'mail' => 'ggggg@mail.com',
                'password' => Hash::make('ggggg12345'),
                'bio' => 'Hola!',
                'created_at' => '2023-04-08 14:37:07',
                'updated_at' => '2023-04-08 14:56:06',
            ],
        ]);
    }
}
