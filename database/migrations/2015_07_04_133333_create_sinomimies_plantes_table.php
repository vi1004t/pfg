<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSinomimiesPlantesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sinonimies_plantes', function(Blueprint $table)
		{
			$table->increments('id');									//id usuari
			$table->integer('planta_id')->unsigned();	//referencia plantes
			$table->foreign('planta_id')->references('id')->on('plantes');
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
		Schema::drop('sinonimies_plantes');
	}

}
