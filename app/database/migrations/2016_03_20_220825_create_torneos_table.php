<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTorneosTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('torneos', function(Blueprint $table) {
            $table->increments('id');
            $table->string('nombre', 50);
            $table->string('escudo', 50)->nullable(); 
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
        Schema::drop('torneos');
    }

}
