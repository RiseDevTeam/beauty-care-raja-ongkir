<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableDetailPembayaran extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_pembayaran', function (Blueprint $table) {

            $table->bigInteger('id_pembayaran');
            $table->string('tipe_pembayaran', '30');
            $table->string('bukti_pembayaran', '50')->nullable();
            $table->string('kota', '100');
            $table->text('alamat');
            $table->bigInteger('kuantiti');
            $table->date('tanggal_pembayaran');
            $table->bigInteger('total_akhir');
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
        Schema::dropIfExists('detail_pembayaran');
    }
}
