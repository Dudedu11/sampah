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
        Schema::table('transaksi_industries', function (Blueprint $table) {
            $table->foreign(['induk_id'], 'fk_transaksiI_induk')->references(['id'])->on('induks');
            $table->foreign(['industri_id'], 'fk_transaksiI_industri')->references(['id'])->on('industries'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('transaksi_industries', function (Blueprint $table) {
            //
        });
    }
};
