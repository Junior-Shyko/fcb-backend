<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class LinkTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('links')->insert([
            'name' => 'Pastor'
        ]);
        DB::table('links')->insert([
            'name' => 'Presbítero'
        ]);
        DB::table('links')->insert([
            'name' => 'Líder'
        ]);
        DB::table('links')->insert([
            'name' => 'Líder em Treinamento'
        ]);
        DB::table('links')->insert([
            'name' => 'Membro'
        ]);
        
    }
}
