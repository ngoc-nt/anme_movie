<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblGenreMovie extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_genre_movie', function (Blueprint $table) {
            $table->Increments('genre_id');
            $table->string('genre_name');
            $table->string('genre_slug');
            $table->text('genre_desc');
            $table->integer('genre_status');
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
        Schema::dropIfExists('tbl_genre_movie');
    }
}
