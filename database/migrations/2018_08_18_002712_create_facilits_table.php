<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacilitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facilits', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('facilitator_id')->nullable();
            $table->text('areatofac')->nullable();
            $table->text('yourdays')->nullable();
            $table->text('beava')->nullable();
            $table->text('beava2')->nullable();
            $table->string('state')->nullable();
            $table->text('areaqualify')->nullable();
            $table->text('areasector')->nullable();
            $table->text('courset')->nullable();
            $table->text('courset2')->nullable();
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
        Schema::dropIfExists('facilits');
    }
}
