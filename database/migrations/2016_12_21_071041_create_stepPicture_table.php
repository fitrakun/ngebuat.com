<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStepPictureTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('StepPictures', function (Blueprint $table) {
            $table->increments('id');
            $table->string('picture',50);
        });

        DB::statement('ALTER Table StepPictures add step_id INTEGER NOT NULL;');
        DB::statement('CREATE INDEX step ON StepPictures (step_id)');

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('Labels');
    }
}
