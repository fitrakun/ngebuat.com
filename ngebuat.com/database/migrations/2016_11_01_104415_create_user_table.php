<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('Users', function (Blueprint $table) {
			$table->increments('id');
			$table->string('username',20);
			$table->string('email',50);
			$table->string('password',25);
			$table->string('nama',20);
			$table->char('gender',1);
			$table->string('telp',15);
			$table->string('website',50);
			$table->string('alamat',50);
			$table->string('kota',20);
			$table->string('kodepos',10);
			$table->string('provinsi',20);
			$table->string('negara',20);
			$table->string('biodata',200);
			$table->rememberToken();
			$table->index(['username']);
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
    }
}
