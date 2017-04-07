<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBillinginfoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tbl_billinginfo', function(Blueprint $table)
		{
			$table->increments('billinginfoid');
			$table->string('unitno',5);
			$table->integer('price');
			$table->date('duedate');
			$table->date('billdate');
			$table->foreign('unitno')
				->references('unitno')
				->on('tbl_housedesc');
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
		Schema::drop('tbl_billinginfo');
	}

}
