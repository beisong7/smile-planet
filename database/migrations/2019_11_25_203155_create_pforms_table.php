<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePformsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pforms', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name')->nullable();
            $table->string('surname')->nullable();
            $table->string('other_name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('bus_type')->nullable(); //business type - idea, startup, existing
            $table->string('bus_name')->nullable();
            $table->string('bus_category')->nullable();
            $table->string('bus_phone')->nullable();
            $table->string('bus_email')->nullable();
            $table->text('bus_address')->nullable();
            $table->string('num_employee')->nullable(); // number of employee
            $table->text('bus_certs')->nullable();
            $table->text('prog_attended')->nullable();// past programs attended
            $table->boolean('seen')->nullable();
            $table->boolean('active')->nullable();
            $table->bigInteger('time')->nullable();
            $table->string('detail_link')->nullable();
            $table->string('detail_type')->nullable();
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
        Schema::dropIfExists('pforms');
    }
}
