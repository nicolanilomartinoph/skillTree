<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class jobsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('jobs')->insert([
            'job name' => 'web developer',
            'logo' => '/var/www/html/skillTree/public/img/jobs/webdeveloper.jpg',
            'sub-skill' => '{}',
            'parent-skill' => '{}'
        ]);

        DB::table('jobs')->insert([
            'job name' => 'game developer',
            'logo' => '/var/www/html/skillTree/public/img/jobs/gamedev-icon.jpg',
            'sub-skill' => '{}',
            'parent-skill' => '{}'
        ]);

        DB::table('jobs')->insert([
            'job name' => 'software developer',
            'logo' => '',
            'sub-skill' => '{}',
            'parent-skill' => '{}'
        ]);
    }
}
