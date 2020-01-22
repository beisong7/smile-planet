<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('details', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->nullable();
            $table->longText('info')->nullable();
            $table->string('link')->nullable();
            $table->text('image')->nullable();
            $table->string('type')->nullable();
            $table->boolean('featured')->nullable();
            $table->boolean('featured1')->nullable();
            $table->text('relative')->nullable();
            $table->text('creator_id')->nullable();
            $table->text('use_reg')->nullable();
            $table->boolean('active')->nullable();
            $table->boolean('pay')->nullable();
            $table->float('price')->nullable();
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
        Schema::dropIfExists('details');
    }
}
