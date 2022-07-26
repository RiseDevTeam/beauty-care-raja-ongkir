<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDaftarOngkirTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daftar_ongkir', function (Blueprint $table) {
            $table->bigIncrements('id_daftar_ongkir');
            $table->string('code', '10');
            $table->string('nama', '50');
            $table->string('service', '10');
            $table->string('description', '50');
            $table->bigInteger('value');
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
        Schema::dropIfExists('daftar_ongkir');
    }
}
