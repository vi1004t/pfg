<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUbicacioCentreToCamps extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('camps', function(Blueprint $table)
		{
			$table->string('ubicacio_centre');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('camps', function(Blueprint $table) {
			$table->dropColumn('ubicacio_centre');
		});

	}

}
