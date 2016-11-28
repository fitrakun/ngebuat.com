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
			$table->string('password',100);
            $table->string('password_no_encrypt',100);
			$table->string('nama',20)->default('');
			$table->char('gender',1)->default('');
            $table->string('telp',15)->default('');
            $table->string('website',50)->default('');
            $table->string('kota',20)->default('');
            $table->string('kodepos',10)->default('');
            $table->string('provinsi',20)->default('');
            $table->string('negara',20)->default('');
            $table->string('biodata',200)->default('');
            $table->tinyInteger('isValid')->default(0);
            $table->tinyInteger('isAdmin')->default(0);
            $table->string('confirmation_token',25);
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
        Schema::dropIfExists('Users');
    }
}
