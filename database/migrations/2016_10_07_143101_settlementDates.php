<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SettlementDates extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('amortizationSchedule', function (Blueprint $table){
            $table->increments('id');
            $table->string('loanId');
            $table->date('settlementDate');
            $table->string('principle');
            $table->string('interest');
            $table->string('isSettled');
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
        //
        Schema::drop('amortizationSchedule');

    }
}
