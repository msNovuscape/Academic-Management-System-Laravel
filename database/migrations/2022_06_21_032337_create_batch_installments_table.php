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
        Schema::create('batch_installments', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('batch_id')->unsigned();
            $table->foreign('batch_id')->references('id')->on('batches');
            $table->string('installment_type');
            $table->date('due_date');
            $table->float('amount');
            $table->float('amount_to_pay');
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
        Schema::dropIfExists('batch_installments');
    }
};
