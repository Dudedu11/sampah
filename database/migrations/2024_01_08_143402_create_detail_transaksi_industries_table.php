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
        Schema::create('detail_transaksi_industries', function (Blueprint $table) {
            $table->bigInteger('id', true);
            $table->bigInteger('transaksi_id')->index('fk_detailI_transaksi');
            $table->bigInteger('sampah_treatment')->index('fk_detailI_treatment');
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
        Schema::dropIfExists('detail_transaksi_industries');
    }
};
