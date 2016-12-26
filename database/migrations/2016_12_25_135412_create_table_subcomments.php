<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableSubcomments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('Subcomments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username',20);
            $table->string('picture_user',50);
            $table->string('body',1000);
            $table->string('created_at',50);
            $table->string('username_pembuat_produk',20);
        });

        DB::statement('ALTER Table Subcomments add comment_id INTEGER NOT NULL;');
        DB::statement('CREATE INDEX product ON Subcomments (comment_id)');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('Subcomments');
    }
}
