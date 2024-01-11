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
        Schema::table('detail_penjemputan_sampah_units', function (Blueprint $table) {
            $table->foreign(['penjemputan_id'], 'fk_detail_penjemputan')->references(['id'])->on('penjemputan_sampah_units');
            $table->foreign(['jenis_sampah_unit_id'], 'fk_detail_jenis')->references(['id'])->on('jenis_sampah_units');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('detail_penjemputan_sampah_units', function (Blueprint $table) {
            //
        });
    }
};
