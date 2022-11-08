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
        Schema::create('s_counselling_attendances', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('created_by')->unsigned();
            $table->foreign('created_by')->references('id')->on('users');
            $table->bigInteger('s_counselling_id')->unsigned();
            $table->foreign('s_counselling_id')->references('id')->on('s_counsellings');
            $table->enum('status', ['1','2']);
            $table->string('symbol'); // P or A
            $table->date('date'); // P or A
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
        Schema::dropIfExists('s_counselling_attendances');
    }
};
