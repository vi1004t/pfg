<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserProfilesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_profiles', function(Blueprint $table)
		{
			$table->increments('id');									//id usuari
			$table->string('nom');										//nom real de l'usuari
			$table->string('cognoms');								//cognoms de l'usuari
			$table->date('naiximent');								//data naiximent
			$table->integer('genere');								//genere usuari
			$table->integer('cp');										//codi postal
			$table->string('poblacio');								//poblacio
			$table->string('provincia');							//provincia
			$table->string('pais');										//pais
			$table->integer('acces');									//permis d'acces
			$table->string('taula_registres');				//nom taula de registres de l'usuari
			$table->integer('visibilitat_id')->unsigned();	//referencia plantes
			$table->foreign('visibilitat_id')->references('id')->on('visibilitats');
			$table->integer('user_id')->unsigned();	//referencia plantes
			$table->foreign('user_id')->references('id')->on('users');
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
		Schema::drop('user_profiles');
	}

}
