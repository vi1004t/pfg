<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSpatialCamps extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		DB::statement('ALTER TABLE camps ADD centre POINT' );
		DB::statement('ALTER TABLE camps ADD poligon LINESTRING' );
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('camps', function(Blueprint $table) {
			$table->dropColumn('centre');
			$table->dropColumn('poligon');
		});

	}

}
