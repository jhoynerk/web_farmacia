<?php

use Illuminate\Database\Migrations\Migration;

class FarmaciaImagenes extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::table('farmacia_imagenes', function($table) {
            $table->create();
            $table->increments('id');
            $table->integer('farmacia_id')->unsigned();
            $table->text('alt');
            $table->text('tipo');
            $table->text('ruta');
            
            $table->foreign('farmacia_id')->references('id')->on('farmacias')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('farmacia_imagenes');
    }

}
