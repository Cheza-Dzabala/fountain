<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ApprovedBy extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('amortizationSchedule', function ($table) {
            $table->string('paymentLoggedBy')->nullable();
            $table->string('paymentType')->nullable();
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
        Schema::table('amortizationSchedule', function ($table) {
            $table->dropColumn('paymentLoggedBy');
            $table->string('paymentType');
        });
    }
}
