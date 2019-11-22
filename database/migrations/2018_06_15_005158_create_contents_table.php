<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contents', function (Blueprint $table) {
            $table->increments('id');
            $table->longText('aboutus')->nullable();
            $table->longText('f_aboutus')->nullable();
            $table->longText('e_aboutus')->nullable();
            $table->longText('vision')->nullable();
            $table->longText('mission')->nullable();
            $table->longText('corevals')->nullable();
            $table->longText('f_what_we_do')->nullable();
            $table->text('f_what_we_do_img')->nullable();
            $table->longText('f_aims_obj')->nullable();
            $table->text('f_aims_obj_img')->nullable();
            $table->longText('f_events')->nullable();
            $table->text('f_events_img')->nullable();
            $table->longText('f_reach')->nullable();
            $table->text('f_reach_img')->nullable();

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
        Schema::dropIfExists('contents');
    }
}
