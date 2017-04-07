<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonalinfoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tbl_personalinfo', function(Blueprint $table)
		{
			$table->increments('personalid');
			$table->string('lastname',20);
			$table->string('firstname',50);
			$table->string('middlename',20);
			$table->date('birthdate');
			$table->string('email',50);
			$table->string('cellno',11);
			$table->char('gender',1);
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
		Schema::drop('tbl_personalinfo');
	}

}
