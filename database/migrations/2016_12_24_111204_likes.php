<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Likes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('Likes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username',50);
        });

        DB::statement('ALTER Table Likes add product_id INTEGER NOT NULL;');
        DB::statement('ALTER TABLE `likes` DROP `id`;');
        DB::statement('CREATE INDEX product ON Likes (product_id)');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('Likes');
    }
}
