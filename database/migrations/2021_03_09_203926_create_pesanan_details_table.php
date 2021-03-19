<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePesananDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pesanan_details', function (Blueprint $table) {
            $table->id();
            $table->boolean('status_keterangan')->default(false);
            $table->string('keterangan')->nullable();
            $table->integer('jumlah_pesanan');
            $table->integer('total_harga');
            $table->string('status')->default(0);
            $table->unsignedBigInteger('product_id')->nullable();
            $table->unsignedBigInteger('pesanan_id')->nullable();
            $table->timestamps();
        });

        Schema::table('pesanan_details', function (Blueprint $kolom) {
            $kolom->foreign('product_id')->references('id')->on('products')->onDelete('cascade')->onUpdate('cascade');
        });
        Schema::table('pesanan_details', function (Blueprint $kolom) {
            $kolom->foreign('pesanan_id')->references('id')->on('pesanans')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pesanan_details');
    }
}
