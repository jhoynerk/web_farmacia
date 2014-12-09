<?php

use Illuminate\Database\Migrations\Migration;

class CreateServiciosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('servicios', function($table)
		{
			$table->create();
			$table->increments('id');
			$table->text('nombre');
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
		Schema::drop('servicios');
	}

}