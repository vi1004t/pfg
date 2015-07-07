<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');									//id usuari
			$table->string('nick')->unique();					//nick
			$table->string('nom');										//nom real de l'usuari
			$table->string('cognoms');								//cognoms de l'usuari
			$table->string('email')->unique();				//e-mail de l'usuari
			$table->string('password', 60);						//password
			$table->date('naiximent');								//data naiximent
			$table->integer('genere');								//genere usuari
			$table->integer('cp');										//codi postal
			$table->string('poblacio');								//poblacio
			$table->string('provincia');							//provincia
			$table->string('pais');										//pais
			$table->integer('acces');									//permis d'acces
			$table->string('taula_registres');				//nom taula de registres de l'usuari
			$table->rememberToken();
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
		Schema::drop('users');
	}

}
