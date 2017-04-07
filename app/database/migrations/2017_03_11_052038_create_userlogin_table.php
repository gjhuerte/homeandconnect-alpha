<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserloginTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tbl_userlogin', function(Blueprint $table)
		{
			$table->string('username',30);
			$table->dateTime('date');
			$table->foreign('username')
				->references('username')
				->on('tbl_user');
			$table->softDeletes();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('tbl_userlogin');
	}

}
