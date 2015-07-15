<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUserIdToCultius extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('cultius', function(Blueprint $table)
		{
			$table->integer('user_profile_id')->unsigned();	//referencia plantes
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
		Schema::table('cultius', function(Blueprint $table) {
			$table->dropForeign('cultius_user_profile_id_foreign');
			$table->dropColumn('user_profile_id');
		});

	}

}
