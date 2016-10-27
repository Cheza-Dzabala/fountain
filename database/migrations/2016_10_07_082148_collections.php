<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Collections extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('collections', function (Blueprint $table){
            $table->increments('id');
            $table->string('loanId');
            $table->string('amount');
            $table->date('date');
            $table->string('amountDue');
            $table->string('collectedBy');
            $table->string('collectionMethodId');
            $table->string('chequeNumber')->nullable();
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
        Schema::Drop('collections');
    }
}
