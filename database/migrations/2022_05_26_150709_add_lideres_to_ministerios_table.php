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
        Schema::table('ministerios', function (Blueprint $table) {
            $table->unsignedBigInteger('lider')->unsigned()->nullable();
            $table->foreign('lider')->references('id')->on('membros');

            $table->unsignedBigInteger('colider')->unsigned()->nullable();
            $table->foreign('colider')->references('id')->on('membros');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ministerios', function (Blueprint $table) {
            //
        });
    }
};
