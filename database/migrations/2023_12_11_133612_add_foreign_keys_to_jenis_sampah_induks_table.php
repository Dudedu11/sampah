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
        Schema::table('jenis_sampah_induks', function (Blueprint $table) {
            $table->foreign(['kategori_id'], 'fk_kategori_jenis')->references(['id'])->on('kategori_sampahs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('jenis_sampahs', function (Blueprint $table) {
            //
        });
    }
};
