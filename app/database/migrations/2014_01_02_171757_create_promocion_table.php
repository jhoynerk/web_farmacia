<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePromocionTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::table('promocion', function($table) {
            $table->create();
            $table->increments('id');
            $table->text('nombre');
            $table->text('descripcion');
            $table->text('tipo');
            $table->text('ruta');
            $table->date('vencimiento');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('promocion');
    }

}
