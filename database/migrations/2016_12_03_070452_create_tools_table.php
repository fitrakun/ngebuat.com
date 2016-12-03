<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateToolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('Tools', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama',50);
        });

        DB::statement('ALTER Table Tools add product_id INTEGER NOT NULL;');
        DB::statement('CREATE INDEX product ON Tools (product_id)');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('Tools');
    }
}
