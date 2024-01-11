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
        Schema::create('detail_pengurangan_units', function (Blueprint $table) {
            $table->bigInteger('id', true);
            $table->bigInteger('pengurangan_id')->index('fk_detailN_pengurangan');
            $table->bigInteger('jenis_sampah_unit_id')->index('fk_penguranganN_jenis');
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
        Schema::dropIfExists('detail_pengurangan_units');
    }
};
