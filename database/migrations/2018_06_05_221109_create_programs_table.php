<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProgramsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('programs', function (Blueprint $table) {

            $table->increments('id');
            $table->string('title');
            $table->string('url')->nullable();
            $table->string('detail');
            $table->string('venue');
            $table->date('date');
            $table->time('time');
            $table->integer('status')->nullable();
            $table->string('type')->nullable();
            $table->integer('gallery_id')->nullable();
            $table->string('dates')->nullable();
            $table->string('ticket')->nullable();
            $table->string('hascert')->nullable();


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
        Schema::dropIfExists('programs');
    }
}
