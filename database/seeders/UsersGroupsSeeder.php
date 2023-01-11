<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory;
use Illuminate\Support\Facades\DB;

class UsersGroupsSeeder extends Seeder
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
            DB::table('users')->insert([
                'name' => $faker->name(),
                'email' => $faker->email(),
                'password' => bcrypt('12345678'),
                'address' =>  $faker->streetName,
                'number' => $faker->randomDigit,
                'complement' => $faker->word ,
                'district' => $faker->cityPrefix,
                'city' =>  $faker->city,
                'state' => $faker->state,
                'phone' => '(85) 98765-0987',
                'situation' => 'Membro',
                'birthday' => $faker->dateTimeThisCentury->format('Y-m-d'),
                'marital_status' => null,
                'baptized' =>  $faker->numberBetween($min = 0, $max = 1),
                'link_id' => 5,
                'active' => 1
            ]);
          }
    }
}
