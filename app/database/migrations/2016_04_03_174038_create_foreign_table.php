<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForeignTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::table('recaudos_ficha', function(Blueprint $table) {
            $table->index('ficha_id');
            $table->foreign('ficha_id')->references('id')->on('fichas');

            $table->index('recaudo_id');
            $table->foreign('recaudo_id')->references('id')->on('recaudos');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::table('recaudos_ficha', function(Blueprint $table) {
            $table->dropForeign('recaudos_ficha_ficha_id_foreign');
            $table->dropIndex('recaudos_ficha_ficha_id_index');

            $table->dropForeign('recaudos_ficha_recaudo_id_foreign');
            $table->dropIndex('recaudos_ficha_recaudo_id_index');
        });
	}

}
