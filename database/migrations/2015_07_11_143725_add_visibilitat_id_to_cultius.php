<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddVisibilitatIdToCultius extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('cultius', function(Blueprint $table)
		{
			$table->integer('visibilitat_id')->unsigned();	//referencia plantes
			$table->foreign('visibilitat_id')->references('id')->on('visibilitats');
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
			$table->dropForeign('cultius_visibilitat_id_foreign');
			$table->dropColumn('visibilitat_id');
		});

	}

}
