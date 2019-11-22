<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFociTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('foci', function (Blueprint $table) {
            $table->increments('id');
            $table->longText('career');
            $table->longText('technical');
            $table->longText('mentoring');
            $table->longText('l_coaching');
            $table->longText('vocation_skills');
            $table->longText('etrep');
            $table->longText('l_gov');
            $table->longText('body_spirit');

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
        Schema::dropIfExists('foci');
    }
}
