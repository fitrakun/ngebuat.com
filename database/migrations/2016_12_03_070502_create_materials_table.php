<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaterialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('Materials', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama',50);
        });

        DB::statement('ALTER Table Materials add product_id INTEGER NOT NULL;');
        DB::statement('CREATE INDEX product ON Materials (product_id)');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('Materials');
    }
}
