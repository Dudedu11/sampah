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
        Schema::table('kategori_sampahs', function (Blueprint $table) {
            $table->foreign(['induk_id'], 'fk_induk_kategori')->references(['id'])->on('induks');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('kategori_sampahs', function (Blueprint $table) {
            //
        });
    }
};
