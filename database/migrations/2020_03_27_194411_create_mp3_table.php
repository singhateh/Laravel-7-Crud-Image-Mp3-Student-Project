<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMp3Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mp3', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('artist_name')->nullable();
            $table->string('album_name')->nullable();
            $table->string('album_year')->nullable();
            $table->string('song_thumnail')->nullable();
            $table->string('song_title')->nullable();
            $table->string('song_name')->nullable();
            $table->string('song_size')->nullable();
            $table->string('song_duration')->nullable();
            $table->string('song_extension')->nullable();
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
        Schema::dropIfExists('mp3');
    }
}
