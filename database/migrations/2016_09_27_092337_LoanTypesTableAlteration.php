<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class LoanTypesTableAlteration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('loanTypes', function ($table){
           $table->string('interestRate');
           $table->string('isActive');
           $table->string('requiresEmployerConsent');
           $table->string('description');
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
        Schema::table('loanTypes', function ($table){
            $table->dropColumn('interestRate');
            $table->dropColumn('isActive');
            $table->dropColumn('requiresEmployerConsent');
            $table->dropColumn('description');
        });
    }
}
