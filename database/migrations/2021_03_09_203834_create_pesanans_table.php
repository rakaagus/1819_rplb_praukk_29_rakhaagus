<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePesanansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pesanans', function (Blueprint $table) {
            $table->id();
            $table->string('kode_pemesanan')->nullable();
            $table->integer('nomeja');
            $table->string('status')->default(0);
            $table->integer('total_harga');
            $table->integer('kode_unik');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->timestamps();
        });

        Schema::table('pesanans', function (Blueprint $kolom) {
            $kolom->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });

        // Schema::table('pesanans', function (Blueprint $kolom) {
        //     $kolom->foreign('detail_id')->references('id')->on('pesanan_details')->onDelete('cascade')->onUpdate('cascade');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pesanans');
    }
}
