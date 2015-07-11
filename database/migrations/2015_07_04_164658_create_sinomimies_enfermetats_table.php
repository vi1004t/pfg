<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSinomimiesEnfermetatsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sinonimies_enfermetat', function(Blueprint $table)
		{
			$table->increments('id');									//id usuari
			$table->integer('enfermetat_id')->unsigned();	//referencia plantes
			$table->foreign('enfermetat_id')->references('id')->on('enfermetats');
			$table->string('nom');										//sinonim
			$table->string('zona');										//zona on es diu
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
		Schema::drop('sinonimies_enfermetat');
	}

}
