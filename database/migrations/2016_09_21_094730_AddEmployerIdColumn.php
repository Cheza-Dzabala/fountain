<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddEmployerIdColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('clients', function ($table){
            $table->string('employer_id')->nullable();
            $table->string('clientRemarks')->nullable();

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
        Schema::table('clients', function ($table){
            $table->dropColumn('employer_id');
            $table->dropColumn('clientRemarks');

        });
    }
}
