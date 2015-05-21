<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWsevaluacionesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{


		//Evalución -> Cuestionario de preguntas
		Schema::create('ws_evaluaciones', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('categoria_id')->unsigned()->nullable();
            $table->integer('evento_id')->unsigned()->nullable(); 
            $table->string('dirigido')->unsigned()->nullable(); //Si es dirigido
            $table->string('descripcion')->nullable();
            $table->string('duracion_preg')->nullable(); //En segundo, etc
            $table->string('duracion_exam')->nullable();//en Minutos
            $table->boolean('one_by_one')->nullable(); //Se responde una pregunta 
            $table->integer('created_by')->unsigned()->nullable();
            $table->timestamps();
        });
		Schema::table('ws_evaluaciones', function(Blueprint $table) {
            $table->foreign('categoria_id')->refences('id')->on('ws_categorias')->onDelete('cascade');
            $table->foreign('evento_id')->refences('id')->on('ws_eventos')->onDelete('cascade');
            $table->foreign('created_by')->refences('id')->on('ws_users')->onDelete('cascade');
        });


        // Pregunta Evaluacion
		Schema::create('ws_evaluaciones', function(Blueprint $table) {
            $table->increments('id');
            $table->string('evaluacion_id')->unsigned()->nullable();
            $table->integer('tipo_preg')->unsigned()->nullable(); 
            $table->string('pregunta_id')->unsigned()->nullable(); // Puede ser 
            $table->integer('added_by')->unsigned()->nullable();
            $table->timestamps();
        });
        Schema::table('ws_preguntas_evaluacion', function(Blueprint $table) {
			$table->foreign('evaluacion_id')->references('id')->on('ws_evaluaciones')->onDelete('cascade');
			$table->foreign('added_by')->references('id')->on('ws_users')->onDelete('cascade');
		});


	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('ws_evaluaciones');
		Schema::drop('ws_preguntas_evaluacion');
	}

}
 