<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnfermetatsPlantesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('enfermetats_plantes', function(Blueprint $table)
		{
			$table->increments('id');									//id usuari
			$table->integer('enfermetat_id')->unsigned();	//referencia plantes
			$table->foreign('enfermetat_id')->references('id')->on('enfermetats');
			$table->integer('plantes_id')->unsigned();	//referencia plantes
			$table->foreign('plantes_id')->references('id')->on('plantes');
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
		Schema::drop('enfermetats_plantes');
	}

}
