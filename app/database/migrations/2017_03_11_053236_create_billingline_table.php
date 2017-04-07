<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBillinglineTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tbl_billingline', function(Blueprint $table)
		{
			$table->integer('billingid')->unsigned();
			$table->integer('paymentid')->unsigned();
			$table->string('status',45)->nullable();
			$table->foreign('billingid')
				->references('billinginfoid')
				->on('tbl_billinginfo');
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
		Schema::drop('tbl_billingline');
	}

}
