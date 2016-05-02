<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTemporadasEquiposTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('temporadas_equipos', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('temporada_categoria_id', false, true);
            $table->integer('club_id', false, true);
            $table->integer('entrenador_id', false, true);
            $table->string('alias', 50);
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
        Schema::drop('club_temporada');
    }

}
