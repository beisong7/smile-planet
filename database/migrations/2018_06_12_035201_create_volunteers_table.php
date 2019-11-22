<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVolunteersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('volunteers', function (Blueprint $table) {

            $table->increments('id');
            $table->string('fname');
            $table->string('lname');
            $table->string('title')->nullable();
            $table->string('dob')->nullable();
            $table->string('gender')->nullable();
            $table->string('busemp');
            $table->string('pos')->nullable();
            $table->string('oaddress')->nullable();
            $table->string('ocity')->nullable();
            $table->string('ostate');
            $table->string('photo');
            $table->string('zipcode')->nullable();
            $table->string('tel1');
            $table->string('tel2')->nullable();
            $table->string('email');
            $table->string('country');
            $table->string('city')->nullable();
            $table->string('address');
            $table->string('website')->nullable();
            $table->string('fbook')->nullable();
            $table->string('igram')->nullable();
            $table->string('tweeta')->nullable();

            $table->string('status')->nullable(); //
            $table->string('password')->nullable();
            $table->string('image')->nullable();
            $table->string('formkey')->nullable();
            $table->string('verify')->nullable();
            $table->bigInteger('formtime');

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
        Schema::dropIfExists('volunteers');
    }
}
