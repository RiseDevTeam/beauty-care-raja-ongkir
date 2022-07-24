<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePembayaran extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembayaran', function (Blueprint $table) {
            $table->bigIncrements('id_pembayaran');
            $table->bigInteger('id_user');
            $table->bigInteger('id_persediaan');
            $table->string('id_kurir')->nullable();
            $table->string('kode_barang', '30');
            $table->string('dikonfirmasi', '50');
            $table->string('status', '20');
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
        Schema::dropIfExists('pembayaran');
    }
}
