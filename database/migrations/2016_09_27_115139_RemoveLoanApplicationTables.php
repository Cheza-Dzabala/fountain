<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemoveLoanApplicationTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::drop('loanApplicationDetails');
        Schema::drop('loanApplication');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::create('loanApplicationDetails', function (Blueprint $table){
            $table->increments('id');
            $table->string('loanApplicationId');
            $table->string('loanComments');
            $table->string('loanSecurity');
            $table->string('loanSecurityValue');
            $table->string('utilityBill');
            $table->string('securityDocument');
            $table->string('employerConsentForm')->nullable();
            $table->timestamps();
        });

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
}
