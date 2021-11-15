<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChapterFormation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chapter_formation', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('formation_id')->unsigned()->index()->nullable();
            $table->foreign('formation_id')->references('id')->on('formations')->onDelete('SET NULL');
    
            $table->bigInteger('chapter_id')->unsigned()->index()->nullable();
            $table->foreign('chapter_id')->references('id')->on('chapters')->onDelete('SET NULL');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chapter_formation');
    }
}
