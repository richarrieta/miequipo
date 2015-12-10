<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBitacorasTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('bitacoras', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('ficha_id', false, true);
            $table->date('fecha');
            $table->string('nota', 1500);
            $table->integer('usuario_id', false, true);
            $table->boolean('ind_activo')->default(0);
            $table->boolean('ind_alarma')->default(0);
            $table->boolean('ind_atendida')->default(0); 
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
        Schema::drop('bitacoras');
    }

}
