<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class ChapterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('chapters')->insert([
            'ownerId' => 1,
            'title' => 'Titre exemple (' . Str::random(4) . ')',
            'content' => Str::random(200),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
