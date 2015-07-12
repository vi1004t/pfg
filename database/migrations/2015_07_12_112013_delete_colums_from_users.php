<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DeleteColumsFromUsers extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('users', function(Blueprint $table) {
		$table->dropColumn('nom');
		$table->dropColumn('cognoms');
		$table->dropColumn('naiximent');
		$table->dropColumn('genere');
		$table->dropColumn('cp');
		$table->dropColumn('poblacio');
		$table->dropColumn('provincia');
		$table->dropColumn('pais');
		$table->dropColumn('taula_registres');

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('users', function(Blueprint $table) {
			$table->string('nom');										//nom real de l'usuari
			$table->string('cognoms');								//cognoms de l'usuari
			$table->date('naiximent');								//data naiximent
			$table->integer('genere');								//genere usuari
			$table->integer('cp');										//codi postal
			$table->string('poblacio');								//poblacio
			$table->string('provincia');							//provincia
			$table->string('pais');										//pais
			$table->string('taula_registres');				//nom taula de registres de l'usuari
		});
	}

}
