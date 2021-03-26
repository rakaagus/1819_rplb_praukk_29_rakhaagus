<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActivitylogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activitylogs', function (Blueprint $table) {
            $table->id();
            $table->string('nama_log', 25);
            $table->text('deskripsi');
            $table->string('tabel', 50);
            $table->string('referensi_id');
            $table->string('user_id', 11);
            $table->string('new_item');
            $table->string('old_item');
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
        Schema::dropIfExists('activitylogs');
    }
}
