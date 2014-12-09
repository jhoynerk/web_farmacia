<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDestacadoFarmaciaTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::table('farmacias', function(Blueprint $table) {
            $table->boolean('destacada')->default(0)->after('telefono');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::table('farmacias', function(Blueprint $table) {
           $table->dropcolumn('destacada');
        });
    }

}
