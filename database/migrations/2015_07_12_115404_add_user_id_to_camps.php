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
			$table->foreign('user_profile_id')->references('id')->on('user_profiles');
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
			$table->dropForeign('camps_user_profile_id_foreign');

		});

	}

}
