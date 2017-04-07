<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComplaintTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tbl_complaint', function(Blueprint $table)
		{
			$table->increments('complaintid');
			$table->string('unitno',5);
			$table->integer('personalid');
			$table->string('title');
			$table->string('description',500);
			$table->date('complaint_date');
			$table->softDeletes();
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('tbl_complaint');
	}

}
