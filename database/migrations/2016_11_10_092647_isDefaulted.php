<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class IsDefaulted extends Migration
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
            $table->boolean('isDefaulted')->nullable();
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
            $table->dropColumn('isDefaulted');
        });
    }
}
