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
        Schema::table('tarik_tunai_units', function (Blueprint $table) {
            $table->foreign(['induk_id'], 'fk_tarikU_induk')->references(['id'])->on('induks');
            $table->foreign(['unit_id'], 'fk_tarikU_unit')->references(['id'])->on('units');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tarik_tunai_units', function (Blueprint $table) {
            //
        });
    }
};
