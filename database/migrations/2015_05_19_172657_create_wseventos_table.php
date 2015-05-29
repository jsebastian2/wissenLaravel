<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class createWseventosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ws_eventos', function(Blueprint $table)
		{
			//EVENTOS
			$table->increments('id');
			$table->string('nombre');
			$table->string('descripcion')->nullable();
			$table->string('examen_actual_id')->unsigned()->nullable();
			$table->integer('with_pay')->nullable();
			$table->integer('precio1')->nullable();
			$table->integer('precio2')->nullable();
			$table->integer('precio3')->nullable();
			$table->integer('precio4')->nullable();
			$table->integer('precio5')->nullable();
			$table->integer('precio6')->nullable();
			$table->boolean('allow_cross_users')->nullable();
			$table->boolean('enable_public_chat')->nullable();
			$table->boolean('enable_private_chat')->nullable();
			$table->timestamps();
		});
		//NIVEL PARTICIPANTES
		Schema::create('ws_nivel_participante', function(Blueprint $table)
		{
			$table-> increments('id');
			$table->integer('nivel_id')->unsigned()->nullable();
			$table->integer('user_id')->unsigned()->nullable();			
			$table->timestamps();
		});
		Schema::table('ws_nivel_participante', function(Blueprint $table){
			$table->foreign('nivel_id')->references('id')->on('ws_categorias')->onDelete('cascade');
		});	

		//INSCRIPCIONES
		Schema::create('ws_inscripciones',function(Blueprint $table){
			$table->increments('id');
			$table->integer('categoria_id')->unsigned()->nullable();
			$table->integer('user_id')->unsigned()->nullable();
			$table->boolean('alloweb_to_answer')->nullable()->default(true);//cuando el participante
			$table->integer('signed_by')->unsigned()->nullable();
			$table->timestamps(); 
		});


		//USER EVENT
		Schema::create('ws_user_event', function(Blueprint $table){
			$table-> increments('id');
			$table->integer('user_id')->unsigned()->nullable();
			$table->integer('event_id')->unsigned()->nullable();			
			$table->integer('pagado')->nullable();//dinero
			$table->integer('signed_by')->unsigned()->nullable();
			$table->timestamps();
		});
		Schema::table('ws_user_event',function(Blueprint $table){

		$table->foreign('user_id')->references('id')->on('ws_user')->onDelete('cascade');
		$table->foreign('event_id')->references('id')->on('ws_events')->onDelete('cascade');
		$table->foreign('signed_by')->references('id')->on('ws_users')->onDelete('cascade');
	});


	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('eventos');
		Schema::drop('ws_nivel_participante');
		Schema::drop('ws_inscripciones');
		Schema::drop('ws_ws_user_event');

	}

}
