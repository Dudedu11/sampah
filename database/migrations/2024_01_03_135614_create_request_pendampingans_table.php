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
        Schema::create('request_pendampingans', function (Blueprint $table) {
            $table->bigInteger('id', true);
            $table->date('tanggal')->nullable();
            $table->string('jenis')->nullable();
            $table->string('nama')->nullable();
            $table->string('alamat')->nullable();
            $table->string('keterangan')->nullable();
            $table->boolean('status')->nullable();
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
        Schema::dropIfExists('request_pendampingans');
    }
};
