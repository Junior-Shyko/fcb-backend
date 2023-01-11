<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory;
use Illuminate\Support\Facades\DB;

class GroupsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        for ($i = 0; $i < 20; $i++) {
            DB::table('groups')->insert([
                'name' => $faker->name(),
                'created_at' =>  $faker->dateTime($max = 'now', $timezone = 'UTC'),
                'updated_at' =>  $faker->dateTime($max = 'now', $timezone = 'UTC')                
            ]);
        }
       
    }
}
