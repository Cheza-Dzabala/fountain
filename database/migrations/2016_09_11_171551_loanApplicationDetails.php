<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class LoanApplicationDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
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
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::drop('loanApplicationDetails');
    }
}
