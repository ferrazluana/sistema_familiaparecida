<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('membro_ministerio', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('membro_id')->unsigned();
            $table->foreign('membro_id')->references('id')->on('membros')->onDelete('cascade');;

            $table->unsignedBigInteger('ministerio_id')->unsigned();
            $table->foreign('ministerio_id')->references('id')->on('ministerios')->onDelete('cascade');;
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
        Schema::dropIfExists('membro_ministerio');
    }
};
