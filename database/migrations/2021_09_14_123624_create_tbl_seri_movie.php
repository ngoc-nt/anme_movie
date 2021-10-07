<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblSeriMovie extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_seri_movie', function (Blueprint $table) {
            $table->increments('seri_id');
            $table->string('seri_name');
            $table->string('seri_name_slug');
            $table->integer('category_id');
            $table->integer('genre_id');
            $table->text('seri_desc');
            $table->text('seri_content');
            $table->integer('seri_year');
            $table->string('seri_image');
            $table->integer('seri_status');
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
        Schema::dropIfExists('tbl_seri_movie');
    }
}
