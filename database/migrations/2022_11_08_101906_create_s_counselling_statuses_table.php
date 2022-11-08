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
        Schema::create('s_counselling_statuses', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('s_counselling_id')->unsigned();
            $table->foreign('s_counselling_id')->references('id')->on('s_counsellings');
            $table->integer('status');
            $table->longText('comment')->nullable();
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
        Schema::dropIfExists('s_counselling_statuses');
    }
};
