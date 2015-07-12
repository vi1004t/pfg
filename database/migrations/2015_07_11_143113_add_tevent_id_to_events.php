<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTeventIdToEvents extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('events', function(Blueprint $table)
		{
			$table->integer('tevent_id')->unsigned();	//referencia plantes
			$table->foreign('tevent_id')->references('id')->on('tevents');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('events', function(Blueprint $table) {
			$table->dropForeign('events_tevent_id_foreign');
			$table->dropColumn('tevent_id');
		});

	}

}
