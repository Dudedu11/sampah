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
        Schema::create('penjemputan_sampah_units', function (Blueprint $table) {
            $table->bigInteger('id', true);
            $table->bigInteger('unit_id')->index('fk_penjempuutan_unit');
            $table->bigInteger('induk_id')->index('fk_penjemputan_induk');
            $table->date('tanggal')->nullable();
            $table->decimal('total', 10,0)->nullable();
            $table->boolean('status')->nullable();
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
        Schema::dropIfExists('penjemputan_sampah_units');
    }
};
