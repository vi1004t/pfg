<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlantesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('plantes', function(Blueprint $table)
		{
			$table->increments('id');									//id usuari
			$table->string('especie')->unique();			//nom de l'especie
			$table->boolean ('cientific');						//indica si el nom que te es cientific o no
			$table->string('descripcio');							//descripcio de la planta
			$table->json('imatges');									//imatges de la planta
			$table->date('planta_inici');							//inici plantar
			$table->date('planta_fi');								//fi plantar
			$table->date('sembra_inici');							//inici sembra
			$table->date('sembra_fi');								//fi sembra
			$table->date('fruta_inici');							//inici fruta
			$table->date('fruta_fi');									//fi fruta
			$table->boolean ('temporada');						//planta de temporada o no
			$table->boolean ('ministeri');						//censat pel ministeri
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
		Schema::drop('plantes');
	}

}
