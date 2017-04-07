<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRentalhistoryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tbl_rentalhistory', function(Blueprint $table)
		{
			$table->integer('personalid')->unsigned();
			$table->string('unitno',5);
			$table->date('rentday');
			$table->foreign('unitno')
				->references('unitno')
				->on('tbl_housedesc');
			$table->foreign('personalid')
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
		Schema::drop('tbl_rentalhistory');
	}

}
