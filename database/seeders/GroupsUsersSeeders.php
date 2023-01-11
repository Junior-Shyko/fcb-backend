<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory;
use Illuminate\Support\Facades\DB;

class GroupsUsersSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        for ($i = 0; $i < 110; $i++) {
            DB::table('group_users')->insert([
                'group_id' => $faker->numberBetween($min = 1, $max = 20),
                'user_id' => $faker->numberBetween($min = 1, $max = 110),
                'created_at' =>  $faker->dateTime($max = 'now', $timezone = 'UTC'),
                'updated_at' =>  $faker->dateTime($max = 'now', $timezone = 'UTC')                
            ]);
        }
    }
}
