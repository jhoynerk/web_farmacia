<?php

use Illuminate\Database\Migrations\Migration;

class CreateFarmaciasTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::table('farmacias', function($table) {
            $table->create();
            $table->increments('id');
            $table->text('nombre');
            $table->text('slogan');
            $table->string('slug',100);
            $table->text('direccion');
            $table->float('latitud',11,8)->nullable();
            $table->float('longitud',11,8)->nullable();
            $table->text('horario');
            $table->text('telefono')->nullable();
            $table->timestamps();
            $table->unique('slug','slugBusqueda');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('farmacias');
    }

}
