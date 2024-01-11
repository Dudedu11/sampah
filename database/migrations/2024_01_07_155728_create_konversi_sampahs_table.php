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
        Schema::create('konversi_sampahs', function (Blueprint $table) {
            $table->bigInteger('id', true);
            $table->bigInteger('induk_id')->index('fk_induk_konversi');
            $table->bigInteger('sampah_id')->index('fk_sampah_konversi');
            $table->bigInteger('treatment_id')->index('fk_treatment_konversi');
            $table->date('tanggal')->nullable();
            $table->string('jumlah_sampah')->nullable();
            $table->string('jumlah_treatment')->nullable();
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
        Schema::dropIfExists('konversi_sampahs');
    }
};
