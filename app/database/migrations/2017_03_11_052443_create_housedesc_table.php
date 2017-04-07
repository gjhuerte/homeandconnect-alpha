<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHousedescTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tbl_housedesc', function(Blueprint $table)
		{
			$table->string('unitno',5);
			$table->string('description',254);
			$table->string('address',100);
			$table->string('status',45);
			$table->integer('price');
			$table->primary('unitno');
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
		Schema::drop('tbl_housedesc');
	}

}
