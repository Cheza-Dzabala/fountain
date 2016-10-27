<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AppendLoansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('loans', function ($table){
            $table->longText('recommendationNotes');
            $table->string('createdBy');
            $table->string('recommendedBy');
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
        Schema::table('loans', function ($table){
            $table->dropColumn('recommendationNotes');
            $table->dropColumn('createdBy');
            $table->dropColumn('recommendedBy');
        });
    }
}
