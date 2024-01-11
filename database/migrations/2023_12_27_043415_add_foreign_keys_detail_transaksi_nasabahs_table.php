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
        Schema::table('detail_transaksi_nasabahs', function (Blueprint $table) {
            $table->foreign(['transaksi_id'], 'fk_detailN_transaksi')->references(['id'])->on('transaksi_nasabahs');
            $table->foreign(['jenis_sampah_unit_id'], 'fk_detailN_jenis')->references(['id'])->on('jenis_sampah_units');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
