<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyLabelTable2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('Labels', function ($table) {
            $table->string('kategori_produk',50);
        });

        DB::statement('CREATE INDEX product ON Labels (nama_produk)');
        DB::statement('CREATE INDEX kproduct ON Labels (kategori_produk)');
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
