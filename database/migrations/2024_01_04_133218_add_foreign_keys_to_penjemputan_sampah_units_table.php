<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('penjemputan_sampah_units', function (Blueprint $table) {
            $table->foreign(['unit_id'], 'fk_penjemputan_unit')->references(['id'])->on('units');
            $table->foreign(['induk_id'], 'fk_penjemputan_induk')->references(['id'])->on('induks');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('penjemputan_sampah_units', function (Blueprint $table) {
            //
        });
    }
};
