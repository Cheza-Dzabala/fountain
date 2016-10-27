<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class LoanDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('loanDetails', function (Blueprint $table){
            $table->increments('id');
            $table->string('loanApplicationId');
            $table->string('loanComments');
            $table->string('loanSecurityTypeId');
            $table->string('loanSecurityValue');
            $table->string('utilityBill');
            $table->string('securityDocument');
            $table->string('payslip_1');
            $table->string('payslip_2');
            $table->string('employerConsentForm')->nullable();
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
        Schema::drop('loanDetails');
    }
}
