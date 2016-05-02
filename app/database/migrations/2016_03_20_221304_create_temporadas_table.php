<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTemporadasTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('temporadas', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('torneo_id', false, true)->nullable();
            $table->string('periodo', 150)->nullable();
            $table->string('nombre', 150)->nullable();
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
        Schema::drop('temporadas');
    }

}
