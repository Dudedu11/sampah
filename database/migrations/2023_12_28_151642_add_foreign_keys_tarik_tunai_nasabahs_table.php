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
        Schema::table('tarik_tunai_nasabahs', function (Blueprint $table) {
            $table->foreign(['unit_id'], 'fk_tarikN_unit')->references(['id'])->on('units');
            $table->foreign(['nasabah_id'], 'fk_tarikN_nasabah')->references(['id'])->on('nasabahs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
