<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGenreSongTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('genre_song', function (Blueprint $table) {
        //     $table->id();
        //     $table->unsignedBigInteger('genre_id');
        //     $table->unsignedBigInteger('song_id');
        //     $table->foreign("genre_id")->references("id")->on('genres');
        //     $table->foreign("song_id")->references("id")->on('songs');
        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('genre_song');
    }
}
