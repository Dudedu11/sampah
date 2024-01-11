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
        Schema::create('pengurangan_sampah_units', function (Blueprint $table) {
            $table->bigInteger('id', true);
            $table->bigInteger('unit_id')->index('fk_penguranganN_unit');
            $table->date('tanggal')->nullable();
            $table->string('keterangan')->nullable();
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
        Schema::dropIfExists('pengurangan_sampah_units');
    }
};
