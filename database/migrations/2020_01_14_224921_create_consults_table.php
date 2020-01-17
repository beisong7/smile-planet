<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConsultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consults', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name')->nullable();
            $table->string('surname')->nullable();
            $table->string('other_name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('bus_type')->nullable();
            $table->string('bus_category')->nullable();
            $table->string('bus_ideal')->nullable();
            $table->string('location')->nullable();
            $table->boolean('active')->nullable();
            $table->bigInteger('time')->nullable();

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
        Schema::dropIfExists('consults');
    }
}
