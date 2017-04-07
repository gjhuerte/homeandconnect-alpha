<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContractTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tbl_contract', function(Blueprint $table)
		{
			$table->increments('contractid');
			$table->string('unitno',5);
			$table->dateTime('date');
			$table->integer('amount');
			$table->integer('months');
			$table->string('contractpath',254);
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
		Schema::drop('tbl_contract');
	}

}
