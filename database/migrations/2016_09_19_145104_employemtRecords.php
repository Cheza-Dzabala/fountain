<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EmployemtRecords extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('employmentRecords', function (Blueprint $table){
            $table->increments('id');
            $table->string('client_id');
            $table->string('employer_id')->required();
            $table->string('employmentStartDate')->required();
            $table->string('employmentEndDate')->nullable();
            $table->string('recordedBy');
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
    }
}
