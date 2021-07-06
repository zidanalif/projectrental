<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSewaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sewa', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('klien')->nullable();
            $table->integer('mobil')->nullable();
            $table->text('tempat_antar')->nullable();
            $table->dateTime('sewa_mulai')->nullable();
            $table->dateTime('hingga')->nullable();
            $table->decimal('total_sewa', 20, 6)->nullable();
            $table->string('tujuan', 300)->nullable();
            $table->string('status_sewa')->nullable();
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
        Schema::dropIfExists('sewa');
    }
}
