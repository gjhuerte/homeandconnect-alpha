<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContractstatusTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tbl_contractstatus', function(Blueprint $table)
		{
			$table->integer('contractid')->unsigned();
			$table->integer('paymentid')->unsigned();
			$table->string('paymenttype',45);
			$table->string('status',45);
			$table->foreign('contractid')
				->references('contractid')
				->on('tbl_contract');
			$table->foreign('paymentid')
				->references('paymentid')
				->on('tbl_payment');
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
		Schema::drop('tbl_contractstatus');
	}

}
