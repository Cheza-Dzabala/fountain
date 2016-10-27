<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Employers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('employers', function (Blueprint $table){
            $table->increments('id');
            $table->string('name');
            $table->string('contactPerson');
            $table->string('primaryContactNumber')->required();
            $table->string('secondaryContactNumber')->required();
            $table->string('physicalAddress')->required();
            $table->string('postalAddress')->required();
            $table->string('emailAddress')->nullable();
            $table->string('createdBy');
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

        Schema::drop('employers');
    }
}
