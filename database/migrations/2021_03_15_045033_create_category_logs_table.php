<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_logs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_category');
            $table->string('event', 40);
            $table->string('keterangan', 100);
            $table->string('old_name', 100);
            $table->string('new_name', 100);
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
        Schema::dropIfExists('category_logs');
    }
}
