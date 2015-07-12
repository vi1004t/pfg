<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCampIdToCultius extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('cultius', function(Blueprint $table)
		{
			//$table->integer('camp_id')->unsigned();	//referencia plantes
			$table->foreign('camp_id')->references('id')->on('camps');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('cultius', function(Blueprint $table) {
			$table->dropForeign('cultius_camp_id_foreign');
			//$table->dropColumn('camp_id');
		});

	}

}
