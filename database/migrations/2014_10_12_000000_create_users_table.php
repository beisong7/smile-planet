<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('fullname')->nullable();
            $table->string('username')->nullable();
            $table->string('tel');
            $table->string('email')->unique();
            $table->string('ip')->nullable();
            $table->integer('who')->default(0); // 0 = user, 1 = business, 4 = admin, 3 = staff
            $table->string('image')->nullable();
            $table->string('status')->nullable();
            $table->string('dsalt')->nullable();
            $table->string('password');
            $table->string('password2')->nullable();
            $table->char('api_token', 60)->nullable();
            $table->rememberToken();
            $table->timestamp('last_seen');
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
        Schema::dropIfExists('users');
    }
}
