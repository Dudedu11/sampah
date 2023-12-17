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
        Schema::create('jenis_sampah_units', function (Blueprint $table) {
            $table->bigInteger('id', true);
            $table->bigInteger('unit_id')->index('fk_unit_jenis');
            $table->string('nama')->nullable();
            $table->string('satuan')->nullable();
            $table->decimal('harga_jual', 10, 0)->nullable();
            $table->decimal('harga_beli', 10, 0)->nullable();
            $table->integer('stok')->default(0);
            $table->string('deskripsi');
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
        Schema::dropIfExists('jenis_sampah_units');
    }
};
