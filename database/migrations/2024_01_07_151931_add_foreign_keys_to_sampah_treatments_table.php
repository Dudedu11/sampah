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
        Schema::table('sampah_treatments', function (Blueprint $table) {
            $table->foreign(['induk_id'], 'fk_induk_treatment')->references(['id'])->on('induks');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sampah_treatments', function (Blueprint $table) {
            //
        });
    }
};
