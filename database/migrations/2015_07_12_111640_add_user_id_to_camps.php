<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUserIdToCamps extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('camps', function(Blueprint $table) {
			$table->dropForeign('camps_user_id_foreign');
			$table->dropColumn('user_id');
			$table->integer('user_profile_id')->unsigned();	//referencia plantes
			//$table->foreign('user_profile_id')->references('id')->on('user_profiles');
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
			//$table->dropForeign('camps_user_profile_id_foreign');
			$table->dropColumn('user_profile_id');
			$table->integer('user_id')->unsigned();	//referencia plantes
			$table->foreign('user_id')->references('id')->on('users');

		});

	}

}
