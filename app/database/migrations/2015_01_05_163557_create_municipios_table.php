<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMunicipiosTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('municipios', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('estado_id', false, true);
            $table->string('nombre', 200);
            $table->boolean('ind_active')->default(1);
            $table->integer('version')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('municipios');
    }

}
