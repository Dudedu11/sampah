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
        Schema::create('detail_penjemputan_sampah_units', function (Blueprint $table) {
            $table->bigInteger('id', true);
            $table->bigInteger('penjemputan_id')->index('fk_detail_penjemputan');
            $table->bigInteger('jenis_sampah_unit_id')->index('fk_detail_jenis');
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
        Schema::dropIfExists('detail_penjemputan_sampah_units');
    }
};
