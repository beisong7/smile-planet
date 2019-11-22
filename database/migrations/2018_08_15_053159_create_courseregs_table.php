<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourseregsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courseregs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('course_id')->nullable();
            $table->string('email')->nullable();
            $table->string('names')->nullable();
            $table->string('phone')->nullable();
            $table->string('gender')->nullable();
            $table->date('dob')->nullable();
            $table->string('country')->nullable();
            $table->text('address')->nullable();
            $table->text('course_expec')->nullable();
            $table->text('course_qst')->nullable();
            $table->integer('edu_level')->nullable();
            $table->string('nok_name')->nullable();
            $table->string('nok_address')->nullable();
            $table->string('nok_phone')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('courseregs');
    }
}
