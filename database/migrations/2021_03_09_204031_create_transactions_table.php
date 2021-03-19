<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pesanan_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->integer('total_bayar');
            $table->string('status')->default(0);
            $table->timestamps();
        });

        Schema::table('transactions', function (Blueprint $kolom) {
            $kolom->foreign('pesanan_id')->references('id')->on('pesanans')->onDelete('cascade')->onUpdate('cascade');
        });
        Schema::table('transactions', function (Blueprint $kolom) {
            $kolom->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
