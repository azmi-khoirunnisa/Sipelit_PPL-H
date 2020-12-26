<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDatapanenIdToPembayaransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pembayarans', function (Blueprint $table) {
            $table->unsignedBigInteger('datapanen_id');
            $table->foreign('datapanen_id')->references('id')->on('datapanens')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pembayarans', function (Blueprint $table) {
            //
        });
    }
}
