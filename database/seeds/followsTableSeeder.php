<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class followsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('follows')->insert([
            [
                'follow' => '2',
                'follower' => '1',
            ],
            [
                'follow' => '3',
                'follower' => '1',
            ],
            [
                'follow' => '1',
                'follower' => '2',
            ],
            [
                'follow' => '4',
                'follower' => '5',
            ],
            [
                'follow' => '7',
                'follower' => '4',
            ],
            [
                'follow' => '5',
                'follower' => '3',
            ],
            [
                'follow' => '6',
                'follower' => '7',
            ],
        ]);
    }
}
