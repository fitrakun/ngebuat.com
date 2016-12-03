<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStepsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('Steps', function (Blueprint $table) {
            $table->increments('id');
            $table->string('judul',50);
            $table->string('penjelasan',1000);
            $table->string('picture',50)->default(null);
        });

        DB::statement('ALTER Table Steps add product_id INTEGER NOT NULL;');
        DB::statement('CREATE INDEX product ON Steps (product_id)');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('Steps');
    }
}
