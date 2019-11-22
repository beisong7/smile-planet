<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventregsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eventregs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('program_id');
            $table->string('title')->nullable();
            $table->string('fname')->nullable();
            $table->string('lname')->nullable();
            $table->string('email')->nullable();
            $table->string('telephone')->nullable();
            $table->string('location')->nullable();
            $table->string('gender')->nullable();
            $table->string('status')->nullable();
            $table->date('dob')->nullable();
            $table->text('hearhow')->nullable();
            $table->text('expectation')->nullable();
            $table->string('ticket')->nullable();
            $table->string('tverify')->nullable();
            $table->string('tvtime')->nullable();
            $table->string('certificate')->nullable();

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
        Schema::dropIfExists('eventregs');
    }
}
