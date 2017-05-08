<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DataTypeMutators extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('amortizationSchedule', function ($table){
            $table->integer('interest')->change();
            $table->integer('total')->change();
            $table->integer('principle')->change();
            $table->boolean('isSettled')->change();
        });

        Schema::table('loans', function ($table){
            $table->integer('loanAmount')->change();
            $table->boolean('isActive')->change();
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
        Schema::table('amortizationSchedule', function ($table){
            $table->string('interest')->change();
            $table->string('total')->change();
            $table->string('principle')->change();
            $table->string('principle')->change();
        });

        Schema::table('loans', function ($table){
            $table->string('loanAmount')->change();
            $table->string('isActive')->change();
        });
    }
}
