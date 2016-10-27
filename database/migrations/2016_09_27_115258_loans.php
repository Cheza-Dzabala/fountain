<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Loans extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('loans', function (Blueprint $table){
            $table->increments('id');
            $table->string('clientId');
            $table->string('loanType');
            $table->string('loanAmount');
            $table->string('loanRepaymentPeriod');
            $table->date('expectedDateOfCompletion')->nullable();
            $table->string('applicationStatusId');
            $table->string('isActive')->nullable();
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
        Schema::drop('loans');
    }
}
