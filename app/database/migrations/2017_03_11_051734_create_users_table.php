<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tbl_user', function(Blueprint $table)
		{
			$table->integer('userid')->unsigned();
			$table->string('username',30);
			$table->string('password',254);
			$table->integer('access_level');
			$table->dateTime('datecreated');
			$table->primary('username');
			$table->foreign('userid')
				->references('personalid')
				->on('tbl_personalinfo');
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
		Schema::drop('tbl_user');
	}

}
