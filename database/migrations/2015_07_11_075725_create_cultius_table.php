<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCultiusTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cultius', function(Blueprint $table)
		{
			$table->increments('id');									//id usuari
			$table->string('headline');								//nom del cultiu
			$table->string('type')->default('default');										//per defecte es 'default'
			$table->string('text');										//descripció
			$table->date('startDate');								//inici de vida
			$table->date('endDate')->nullable();									//fi de vida
			$table->json('imatges')->nullable();									//imatge del cultiu
			$table->integer('planta_id')->unsigned();	//referencia plantes
			$table->foreign('planta_id')->references('id')->on('plantes');
			$table->boolean ('fi')->default(0);										//si 1 -> cultiu finalitzat
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
		Schema::drop('cultius');
	}

}
