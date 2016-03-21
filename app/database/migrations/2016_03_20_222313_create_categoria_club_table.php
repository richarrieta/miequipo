<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriaClubTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('categoria_club', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('categoria_id', false, true);
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
        Schema::drop('categoria_club');
    }

}
