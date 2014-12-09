<?php

use Illuminate\Database\Migrations\Migration;

class CreateFarmaciaServiciosTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::table('farmacia_servicio', function($table) {
            $table->create();
            $table->increments('id');
            $table->integer('farmacia_id')->unsigned();
            $table->integer('servicio_id')->unsigned();
            $table->timestamps();

            $table->foreign('farmacia_id')->references('id')->on('farmacias')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('servicio_id')->references('id')->on('servicios')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('farmacia_servicio');
    }

}
