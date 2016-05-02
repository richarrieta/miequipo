<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTemporadasCategoriasTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('temporadas_categorias', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('temporada_id', false, true)->nullable();
            $table->string('nombre')->nullable();
            $table->decimal('monto_temporada', 14, 2)->nullable();
            $table->decimal('monto_arbitraje', 14, 2)->nullable();
            $table->string('anos_categoria')->nullable();
            $table->integer('maximo_jugadores_listado')->nullable();
            $table->integer('modalidad')->nullable();
            $table->integer('minutos_juego', false, true)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('temporadas_categorias');
    }

}
