<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCentresToCamps extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('camps', function(Blueprint $table)
		{
			$table->float('centrex');
			$table->float('centrey');
			$table->dropColumn('ubicacio_centre');
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
			$table->string('ubicacio_centre');
			$table->dropColumn('centrex');
			$table->dropColumn('centrey');
		});

	}

}
