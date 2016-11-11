<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SettledOn extends Migration
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
            $table->date('settledOn')->nullable();
            $table->string('chequeNumber')->nullable();
            $table->string('receiptNumber')->nullable();
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
            $table->dropColumn('settledOn');
            $table->dropColumn('chequeNumber')->nullable();
            $table->dropColumn('receiptNumber')->nullable();
        });
    }
}
