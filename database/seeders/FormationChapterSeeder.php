<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class FormationChapterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rand1 = rand(1,20);
        $rand2 = rand(1,40);

        $check = DB::table('chapter_formation')->where('formation_id', '=', $rand1)->where('chapter_id', '=', $rand2)->first();

        if($check === null) {
            DB::table('chapter_formation')->insert([
                'formation_id' => $rand1,
                'chapter_id' => $rand2
            ]);
        }
    }
}
