<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMoveoutTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tbl_moveout', function(Blueprint $table)
		{
			$table->string('unitno',5);
			$table->date('moveoutdate');
			$table->string('status',15);
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
		Schema::drop('tbl_moveout');
	}

}
