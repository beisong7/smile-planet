<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacilitatorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facilitators', function (Blueprint $table) {
            $table->increments('id');

            $table->string('fname');
            $table->string('lname');
            $table->string('title');
            $table->string('gender');
            $table->string('dob');
            $table->string('passport');
            $table->string('edu_course');
            $table->string('edu_grad');
            $table->string('edu_pcourse');
            $table->string('edu_pgrad');
            $table->string('jobrole');
            $table->string('cur_busname');
            $table->text('other_skill');
            $table->string('oavailable');
            $table->string('oavailable2');
            $table->string('fduty');
            $table->string('fduty2');
            $table->text('skilreq');
            $table->text('skilnhobby');
            $table->text('rea4app');
            $table->text('exp4role');
            $table->string('hearhow');
            $table->string('hearhow2');
            $table->string('tel1');
            $table->string('tel2');
            $table->string('email');
            $table->string('country');
            $table->string('state');
            $table->text('address');
            $table->string('website');
            $table->string('fbook');
            $table->string('igram');
            $table->string('twitter');
            $table->string('arname');
            $table->string('arorganisation');
            $table->string('arposition');
            $table->string('aremail');
            $table->string('arphone');
            $table->string('prname');
            $table->string('prorganisation');
            $table->string('prposition');
            $table->string('premail');
            $table->string('prphone');
            $table->string('status');
            $table->string('verify');
            $table->string('formkey');

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
        Schema::dropIfExists('facilitators');
    }
}
