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
        Schema::create('nasabahs', function (Blueprint $table) {
            $table->bigInteger('unit_id')->index('fk_unit_nasabah');
            $table->bigInteger('id', true);
            $table->string('nik')->nullable();
            $table->string('nama')->nullable();
            $table->string('alamat')->nullable();
            $table->string('no_telepon')->nullable();
            $table->string('no_rekening')->nullable();
            $table->string('nama_bank')->nullable();
            $table->decimal('saldo', 10,0)->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nasabahs');
    }
};
