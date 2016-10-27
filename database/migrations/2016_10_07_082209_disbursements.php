<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Disbursements extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('disbursements', function (Blueprint $table){
            $table->increments('id');
            $table->string('loanId');
            $table->string('disbursedAmount');
            $table->string('disbursedBy');
            $table->string('chequeNumber')->nullable();
            $table->date('date');
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
        Schema::drop('disbursements');
    }
}
