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
        Schema::create('jenis_sampah_induks', function (Blueprint $table) {
            $table->bigInteger('id', true);
            $table->bigInteger('kategori_id')->index('fk_kategori_jenis');
            $table->string('nama')->nullable();
            $table->string('satuan')->nullable();
            $table->decimal('harga', 10, 0)->nullable();
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
        Schema::dropIfExists('jenis_sampahs');
    }
};
