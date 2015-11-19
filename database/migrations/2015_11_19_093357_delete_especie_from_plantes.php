<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DeleteEspecieFromPlantes extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('plantes', function(Blueprint $table) {
			$table->dropColumn('especie');
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
		Schema::table('plantes', function(Blueprint $table) {
			$table->string('especie')->unique();			//nom de l'especie
		});
	}

}
