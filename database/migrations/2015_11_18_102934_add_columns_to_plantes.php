<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsToPlantes extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('plantes', function(Blueprint $table) {
			$table->integer('creador_id')->unsigned();	//referencia a usuari_profile
			$table->integer('modificador_id')->unsigned();	//referencia a usuari_profile
			$table->integer('temporal')->unsigned();	//referencia a versio pendent d'aprovar per part del creador o qui siga
			$table->boolean('validat');
			//no pose les foreign keys perquè no vull dependencies
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		$table->dropColumn('creador_id');
		$table->dropColumn('modificador_id');
		$table->dropColumn('temporal');
		$table->dropColumn('validat');
	}

}
