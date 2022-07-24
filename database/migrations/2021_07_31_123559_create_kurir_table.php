<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKurirTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kurir', function (Blueprint $table) {
            $table->bigIncrements('id_kurir');
            $table->string('nama_kurir', '100');
            $table->bigInteger('harga');
            $table->string('wilayah', '50');
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
        Schema::dropIfExists('kurir');
    }
}
