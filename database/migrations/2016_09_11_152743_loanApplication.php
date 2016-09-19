<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class LoanApplication extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('loanApplication', function (Blueprint $table){
            $table->increments('id');
            $table->string('loanType');
            $table->string('loanAmount');
            $table->string('loanRepaymentPeriod');
            $table->string('loanDisbursementDate');
            $table->string('startRepaymentDate');
            $table->string('installments');
            $table->string('isActive');
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
        Schema::drop('loanApplication');
    }
}
