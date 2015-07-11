<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('events', function(Blueprint $table)
		{
			$table->increments('id');									//id event
			$table->string('headline');								//nom del event, utilitzat per al timeline
			$table->string('text');										//descripció
			$table->date('startDate');								//inici de vida
			$table->date('endDate');									//fi de vida
			$table->string('assetmedia');						//link multimedia
			$table->string('assetcredit');						//credits del link
			$table->string('assetcaption');					//subltitol del link
			$table->integer('cultiu_id')->unsigned();	//referencia plantes
			$table->foreign('cultiu_id')->references('id')->on('cultius');
			$table->integer('accio_id')->unsigned();	//ID de la taula de l'accio de l'event. ex: ID 3 de taula Malaltia
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('events');
	}

}
