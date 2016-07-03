<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBeatmapsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('beatmaps', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('beatmap_id');
            $table->string('artist');
            $table->string('title');
            $table->float('difficultyrating');
            $table->integer('mode');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('beatmaps');
    }
}
