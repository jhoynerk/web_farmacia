<?php

use Illuminate\Database\Migrations\Migration;

class AddColumnsImagen extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::table('farmacia_imagenes', function($table) {
            $table->dropColumn('ruta');
            $table->text('imagen600')->after('tipo');
            $table->text('imagen250')->after('imagen600');
            $table->text('imagen60')->after('imagen250');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        //
    }

}
