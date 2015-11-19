<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyCientificFromPlantes extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('plantes', function(Blueprint $table) {
			$table->dropColumn('cientific');
			//$table->string('cientific')->unique();							//descripcio de la planta
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
		//	$table->dropColumn('cientific');
			$table->boolean ('cientific');						//indica si el nom que te es cientific o no
		});
	}

}
