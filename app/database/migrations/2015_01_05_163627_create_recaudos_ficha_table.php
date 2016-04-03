<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatesRecaudoFichaTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('recaudos_ficha', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('ficha_id', false, true);
            $table->integer('recaudo_id', false, true);
            $table->boolean('ind_recibido')->nullable()->default(0);
            $table->date('fecha_vencimiento')->nullable();
            $table->string('documento', 100)->nullable();
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
        Schema::drop('recaudos_ficha');
    }

}
