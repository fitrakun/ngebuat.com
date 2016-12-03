<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('Products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama',50);
            $table->integer('kesulitan');
            $table->string('harga',10);
            $table->string('kategori',50);
            $table->string('penjelasan',200);
            $table->integer('penghargaan')->default(0);
            $table->integer('likes')->default(0);
            $table->integer('views')->default(0);
            $table->string('username_pembuat',20);
            $table->index(['id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('Products');
    }
}
