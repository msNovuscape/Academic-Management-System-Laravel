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
        Schema::create('batches', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('time_slot_id')->unsigned();
            $table->foreign('time_slot_id')->references('id')->on('time_slots');
            $table->bigInteger('fiscal_year_id')->unsigned();
            $table->foreign('fiscal_year_id')->references('id')->on('fiscal_years');
            $table->date('start_date');
            $table->date('end_date');
            $table->string('remark')->nullable();
            $table->enum('status',[1,2]);
            $table->string('name')->unique();
            $table->float('fee');
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
        Schema::dropIfExists('batches');
    }
};
