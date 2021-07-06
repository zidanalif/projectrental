<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKlienTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('klien', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nik', 300)->nullable();
            $table->string('nama', 300)->nullable();
            $table->string('no_telp', 300)->nullable();
            $table->text('alamat')->nullable();
            $table->string('jenis_kelamin')->nullable();
            $table->string('foto_diri', 300)->nullable();
            $table->string('foto_ktp', 300)->nullable();
            $table->string('perusahaan', 300)->nullable();
            $table->string('email')->nullable();
            $table->string('sandi')->nullable();
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
        Schema::dropIfExists('klien');
    }
}
