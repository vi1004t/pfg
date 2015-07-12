<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVisibilitatsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('visibilitats', function(Blueprint $table)
		{
			$table->increments('id');								//id visibilitat
			$table->string('nom')->unique();				//Tipus de visibilitat
			$table->string('descripcio');						//descripcio
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
		Schema::drop('visibilitats');
	}

}
