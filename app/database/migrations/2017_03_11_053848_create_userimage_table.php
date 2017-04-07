<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserimageTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tbl_userimage', function(Blueprint $table)
		{
			$table->integer('id')->unsigned();
			$table->string('imagepath',254);
			$table->foreign('id')
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
		Schema::drop('tbl_userimage');
	}

}
