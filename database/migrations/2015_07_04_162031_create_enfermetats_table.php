<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnfermetatsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('enfermetats', function(Blueprint $table)
		{
			$table->increments('id');									//id usuari
			$table->string('nom')->unique();					//nom de l'especie
			$table->boolean ('cientific');						//indica si el nom que te es cientific o no
			$table->string('simptomes');							//simptomes de l'enfermetat
			$table->string('descripcio');							//descripcio de l'enfermetat
			$table->json('imatges');									//imatges de l'enfermetat
			$table->date('enfermetat_inici');					//inici epcoca enfermetat
			$table->date('enfermetat_fi');						//fi epoca enfermetat
			$table->boolean ('ministeri');						//censat pel ministeri
			$table->integer ('patogen_id')->unsigned();	//classe d'agent patogen que crea l'enfermetat
			$table->foreign('patogen_id')
						->references('id')
						->on('patogens')
						//->onDelete('cascade')
						;
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
			Schema::drop('enfermetats');
	}

}
