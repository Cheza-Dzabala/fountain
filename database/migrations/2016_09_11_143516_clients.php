<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Clients extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('clients', function (Blueprint $table){
            $table->increments('id');
            $table->string('firstName')->required();
            $table->string('lastName')->required();
            $table->string('otherNames')->required();
            $table->date('dateOfBirth')->required();
            $table->string('gender')->required();
            $table->string('clientImage')->required();
            $table->string('primaryContactNumber')->required();
            $table->string('secondaryContactNumber')->nullable();
            $table->string('primaryEmailAddress')->nullable();
            $table->string('secondaryEmailAddress')->nullable();
            $table->string('physicalAddress')->required();
            $table->string('postalAddress')->required();
            $table->string('locationId')->required();
            $table->boolean('employmentStatus')->required();
            $table->string('bankName')->required();
            $table->string('bankAccountName')->required();
            $table->string('bankAccountNumber')->required();
            $table->string('bankBranch')->required();
            $table->string('idType')->required();
            $table->string('idNumber')->required();
            $table->string('dateIssued')->required();
            $table->string('placeIssued')->required();
            $table->date('expiryDate')->required();
            $table->string('idImage')->required();
            $table->string('createdBy')->required();
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
        Schema::drop('clients');
    }
}
