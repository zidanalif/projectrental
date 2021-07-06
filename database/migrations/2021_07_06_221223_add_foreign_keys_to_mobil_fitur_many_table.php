<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToMobilFiturManyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mobil_fitur_many', function (Blueprint $table) {
            $table->foreign('parent_id', 'fk_mobil_fitur')->references('id')->on('mobil')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mobil_fitur_many', function (Blueprint $table) {
            $table->dropForeign('fk_mobil_fitur');
        });
    }
}
