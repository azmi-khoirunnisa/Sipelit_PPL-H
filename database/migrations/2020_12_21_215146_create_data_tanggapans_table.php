<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDataTanggapansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_tanggapans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('harga',10);
            $table->text('deskripsi');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('datapanen_id');
            $table->foreign('datapanen_id')->references('id')->on('datapanens')->onDelete('cascade');
            $table->unsignedBigInteger('tanggapan_id');
            $table->foreign('tanggapan_id')->references('id')->on('tanggapans')->onDelete('cascade');
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
        Schema::dropIfExists('data_tanggapans');
    }
}
