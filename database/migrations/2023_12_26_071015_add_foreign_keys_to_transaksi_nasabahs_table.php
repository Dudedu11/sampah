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
        Schema::table('transaksi_nasabahs', function (Blueprint $table) {
            $table->foreign(['unit_id'], 'fk_transaksiN_unit')->references(['id'])->on('units');
            $table->foreign(['nasabah_id'], 'fk_transaksiN_nasabah')->references(['id'])->on('nasabahs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('transaksi_nasabahs', function (Blueprint $table) {
            //
        });
    }
};
