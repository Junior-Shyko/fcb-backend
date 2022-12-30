<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = Factory::create();
        for ($i=0; $i < 10; $i++) { 
            DB::table('users')->insert([
                'name' => $faker->name(),
                'email' => $faker->email(),
                'link_id' => 5,
                'password' => bcrypt('12345678'),
            ]);
        }
    }
}
