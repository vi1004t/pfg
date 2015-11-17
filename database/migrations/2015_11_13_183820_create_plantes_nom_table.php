<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlantesNomTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('plantes_nom', function(Blueprint $table)
		{
			$table->increments('id');															//id usuari
			$table->string('nom')->unique();											//nick
			$table->integer('planta_id')->unsigned();							//foreign key de planta id
			$table->foreign('planta_id')->references('id')->on('plantes');
			$table->integer('user_profile_id')->unsigned();							//foreign key de user id
			$table->foreign('user_profile_id')->references('id')->on('user_profiles');
			$table->integer('contador');													//contador de vegades utilitzat
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
		$table->dropForeign('plantes_nom_planta_id_foreign');
		$table->dropForeign('plantes_nom_user_profile_id_foreign');
		Schema::drop('plantes_nom');
	}

}
