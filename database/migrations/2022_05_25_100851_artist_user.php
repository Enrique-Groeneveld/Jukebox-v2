<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ArtistUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

            // Schema::create('artist_user', function (Blueprint $table) {
            //     $table->id();
            //     $table->unsignedBigInteger('artist_id');
            //     $table->foreign("artist_id")->references("id")->on('artists');
            //     $table->unsignedBigInteger('user_id');
            //     $table->foreign("user_id")->references("id")->on('users');
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
        //
    }
}
