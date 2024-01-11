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
        Schema::create('detail_transaksi_nasabahs', function (Blueprint $table) {
            $table->bigInteger('id', true);
            $table->bigInteger('transaksi_id')->index('fk_detailN_transaksi');
            $table->bigInteger('jenis_sampah_unit_id')->index('fk_detailN_jenis');
            $table->integer('jumlah')->nullable();
            $table->decimal('total', 10,0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_transaksi_nasabahs');
    }
};
