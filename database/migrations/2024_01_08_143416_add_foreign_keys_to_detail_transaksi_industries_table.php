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
        Schema::table('detail_transaksi_industries', function (Blueprint $table) {
            $table->foreign(['transaksi_id'], 'fk_detailI_transaksi')->references(['id'])->on('transaksi_industries');
            $table->foreign(['sampah_treatment'], 'fk_detailI_treatment')->references(['id'])->on('sampah_treatments');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('detail_transaksi_industries', function (Blueprint $table) {
            //
        });
    }
};
