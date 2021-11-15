<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\CategorySeeder;
use Database\Seeders\ChapterSeeder;
use Database\Seeders\FormationSeeder;
use Database\Seeders\UserSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
           UserSeeder::class 
        ]);

        for($i = 0; $i < 3; $i++) {
            $this->call([
                CategorySeeder::class 
             ]);
        }

        for($i = 0; $i < 20; $i++) {
            $this->call([
                FormationSeeder::class 
             ]);
        }

        for($i = 0; $i < 40; $i++) {
            $this->call([
                ChapterSeeder::class 
             ]);
        }

        for($i = 0; $i < 60; $i++) {
            $this->call([
                FormationChapterSeeder::class 
             ]);
        }

        for($i = 0; $i < 60; $i++) {
            $this->call([
                FormationCategorySeeder::class 
             ]);
        }

        
    }
}
