<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->index();
            $table->string('username');
            $table->integer('mode');
            $table->string('canonical_username')->index();
            $table->integer('count300');
            $table->integer('count100');
            $table->integer('count50');
            $table->integer('playcount');
            $table->integer('ranked_score');
            $table->integer('total_score');
            $table->integer('pp_rank');
            $table->float('level');
            $table->integer('pp_raw');
            $table->float('accuracy');
            $table->integer('count_rank_ss');
            $table->integer('count_rank_s');
            $table->integer('count_rank_a');
            $table->string('country');
            $table->integer('pp_country_rank');
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
        Schema::drop('users');
    }
}