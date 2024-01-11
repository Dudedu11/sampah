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
        Schema::create('transaksi_nasabahs', function (Blueprint $table) {
            $table->bigInteger('id', true);
            $table->bigInteger('unit_id')->index('fk_transaksiN_unit');
            $table->bigInteger('nasabah_id')->index('fk_transaksiN_nasabah');
            $table->date('tanggal')->nullable();
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
        Schema::dropIfExists('transaksi_nasabahs');
    }
};
