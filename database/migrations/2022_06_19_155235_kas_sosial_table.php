<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class KasSosialTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kas_sosial', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->longtext('uraian');
            $table->integer('masuk')->nullable();
            $table->integer('keluar')->nullable();
            $table->string('jenis');
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
        Schema::dropIfExists('kas_sosial');
    }
}
