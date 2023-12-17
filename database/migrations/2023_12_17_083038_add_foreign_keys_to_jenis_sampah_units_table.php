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
        Schema::table('jenis_sampah_units', function (Blueprint $table) {
            $table->foreign(['unit_id'], 'fk_unit_jenis')->references(['id'])->on('units');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('jenis_sampah_units', function (Blueprint $table) {
            //
        });
    }
};
