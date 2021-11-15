<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('categories')->insert([
            'ownerId' => 1,
            'title' => 'Titre exemple (' . Str::random(4) . ')',
            'description' => 'Description exemple (' . Str::random(10) . ')',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
