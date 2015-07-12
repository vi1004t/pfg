<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropVisibilitatIdFromUsers extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('users', function(Blueprint $table) {
			$table->dropForeign('users_visibilitat_id_foreign');
			$table->dropColumn('visibilitat_id');
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
			$table->integer('visibilitat_id')->unsigned();
			$table->foreign('visibilitat_id')->references('id')->on('visibilitats');

		});

	}

}
