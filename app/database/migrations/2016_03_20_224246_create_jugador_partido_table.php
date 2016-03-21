<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJugadorPartidoTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('jugador_partido', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('partido_id', false, true);
            $table->integer('ficha_id', false, true);
            $table->integer('goles')->nullable();
            $table->integer('asistencias')->nullable();
            $table->integer('amarillas')->nullable();
            $table->string('observaciones', 1500)->nullable();
            $table->boolean('ind_active')->default(1);
            $table->integer('version')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('jugador_partido');
    }

}
