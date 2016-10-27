<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class StateChanges extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('stateChanges', function (Blueprint $table){
            $table->increments('id');
            $table->string('loanId');
            $table->string('statusId');
            $table->string('moderatorId');
            $table->longText('moderatorComments');
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
        Schema::drop('stateChanges');
    }
}
