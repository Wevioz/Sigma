<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class FormationCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rand1 = rand(1,20);
        $rand2 = rand(1,3);

        $check = DB::table('category_formation')->where('formation_id', '=', $rand1)->where('category_id', '=', $rand2)->first();

        if($check === null) {
            DB::table('category_formation')->insert([
                'formation_id' => $rand1,
                'category_id' => $rand2
            ]);
        }
        
    }
}
