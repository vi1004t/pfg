<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCampsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('camps', function(Blueprint $table)
		{
			$table->increments('id');									//id usuari
			$table->integer('user_id')->unsigned();		//referencia usuari al que pertany
			$table->foreign('user_id')->references('id')->on('users');
			$table->string('nom');										//nom del bancal
			$table->string('descripcio');							//descripcio del bancal
			$table->json('ubicacio')->nullable();			//ubicacio del bancal
			$table->string('poble');										//poble on esta el bancal
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
		Schema::drop('camps');
	}

}
