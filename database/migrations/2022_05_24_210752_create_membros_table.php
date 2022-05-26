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
        Schema::create('membros', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->date('birth_date');
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->string('marital_status');

            $table->string('personality')->nullable();

            $table->text('description')->nullable();

            $table->boolean('isBaptized')->default(false);
            $table->boolean('isLeader')->default(false);
            $table->boolean('isPastor')->default(false);

            $table->unsignedBigInteger('status_id')->unsigned();
            $table->foreign('status_id')->references('id')->on('status');

            $table->string('spouse_name')->nullable();
            $table->date('wedding_date')->nullable();

            $table->date('baptized_date')->nullable();

            $table->string('discipler')->nullable();

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
        Schema::dropIfExists('membros');
    }
};
