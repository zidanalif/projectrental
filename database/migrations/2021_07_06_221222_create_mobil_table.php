<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMobilTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mobil', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama_mobil', 300)->nullable();
            $table->integer('merek')->nullable();
            $table->integer('kategori')->nullable();
            $table->dateTime('tanggal_pajak')->nullable();
            $table->string('plat_nomor', 300)->nullable();
            $table->string('no_mesin', 300)->nullable();
            $table->integer('kapasitas_silinder')->nullable();
            $table->string('bahan_bakar')->nullable();
            $table->integer('kursi_penumpang')->nullable();
            $table->string('tahun', 300)->nullable();
            $table->decimal('harga_sewa', 20, 6)->nullable();
            $table->string('foto', 300)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mobil');
    }
}
