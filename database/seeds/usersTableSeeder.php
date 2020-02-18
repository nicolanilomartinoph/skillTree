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
        //
        DB::table('users')->insert([
            'name' => 'test1',
            'email' => 'test1@test1.com',
            'password' => Hash::make('password'),
            'web developer' => '1',
            'game developer' => '1',
        ]);

        DB::table('users')->insert([
            'name' => 'test2',
            'email' => 'test2@test2.com',
            'password' => Hash::make('password'),
            'web developer' => '0',
            'game developer' => '1',
        ]);

        DB::table('users')->insert([
            'name' => 'test3',
            'email' => 'test3@test3.com',
            'password' => Hash::make('password'),
            'web developer' => '1',
            'game developer' => '0',
        ]);

        DB::table('users')->insert([
            'name' => 'test4',
            'email' => 'test4@test4.com',
            'password' => Hash::make('password'),
            'web developer' => '0',
            'game developer' => '0',
        ]);
    }
}
