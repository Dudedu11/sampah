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
        Schema::table('konversi_sampahs', function (Blueprint $table) {
            $table->foreign(['induk_id'], 'fk_induk_konversi')->references(['id'])->on('induks');
            $table->foreign(['sampah_id'], 'fk_sampah_konversi')->references(['id'])->on('jenis_sampah_induks');
            $table->foreign(['treatment_id'], 'fk_treatment_konversi')->references(['id'])->on('sampah_treatments');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('konversi_sampahs', function (Blueprint $table) {
            //
        });
    }
};
