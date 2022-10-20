<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRiwayatTransaksisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('riwayat_transaksis', function (Blueprint $table) {
            $table->increments('id')->nullable();
            $table->unsignedInteger('user_id')->nullable();
            $table->string('jenis_transaksi')->nullable();
            $table->bigInteger('jumlah_masuk')->nullable();
            $table->bigInteger('jumlah_keluar')->nullable();
            $table->datetime('tgl_transaksi')->nullable();

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
        Schema::dropIfExists('riwayat_transaksis');
    }
}
