<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMoviesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->text('overview');
            $table->string('year');
            $table->string('director');
            $table->string('stars');
            $table->string('runtime');
            $table->string('writer');
            $table->string('released_date');
            $table->string('mmpa_rating');
            $table->string('youtube_code');
            $table->integer('category_id'); //note that the column name is a convention in Laravel
            $table->string('poster');
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
        Schema::dropIfExists('movies');
    }
}
