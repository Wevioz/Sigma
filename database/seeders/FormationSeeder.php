<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class FormationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('formations')->insert([
            'ownerId' => 1,
            'title' => 'Titre exemple (' . Str::random(4) . ')',
            'description' => 'Description exemple (' . Str::random(10) . ')',
            'thumbnail' => rand(1,10).".jpg",
            'price' => rand(50, 100),
            'duration' => '1H',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
