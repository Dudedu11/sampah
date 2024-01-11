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
        Schema::create('transaksi_industries', function (Blueprint $table) {
            $table->bigInteger('id', true);
            $table->bigInteger('induk_id')->index('fk_transaksiI_induk');
            $table->bigInteger('industri_id')->index('fk_transaksiI_industri');
            $table->date('tanggal')->nullable();
            $table->decimal('total', 10, 0);
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
        Schema::dropIfExists('transaksi_industries');
    }
};
