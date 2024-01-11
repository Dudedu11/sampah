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
        Schema::table('detail_pengurangan_units', function (Blueprint $table) {
            $table->foreign(['pengurangan_id'], 'fk_detailN_pengurangan')->references(['id'])->on('pengurangan_units');
            $table->foreign(['jenis_sampah_unit_id'], 'fk_penguranganN_jenis')->references(['id'])->on('jenis_sampah_units');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('detail_pengurangan_units', function (Blueprint $table) {
            //
        });
    }
};
