<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeventsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tevents', function(Blueprint $table)
		{
			$table->increments('id');									//id event
			$table->string('nom')->unique();				//Tipus d'event
			$table->string('taccio');									//taula on relacionar el ID de l'event
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
		Schema::drop('tevents');
	}

}
