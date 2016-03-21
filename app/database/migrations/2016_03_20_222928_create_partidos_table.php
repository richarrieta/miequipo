<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePartidosTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('partidos', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('categoria_club_casa_id', false, true);
            $table->integer('categoria_club_visitante_id', false, true);
            $table->date('fecha_programada')->nullable();
            $table->date('fecha_partido')->nullable();
            $table->integer('arbitro_id', false, true);
            $table->string('observaciones', 1500)->nullable();
            $table->string('informe', 1500)->nullable();
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
        Schema::drop('partidos');
    }

}
