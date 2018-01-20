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
            $table->string('first_name');
            $table->string('last_name');
            $table->string('slug');
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
            //$table->string('remember_token')->nullable();
            $table->string('verifyToken');
            $table->boolean('status')->default(0);
            $table->string('image')->nullable();
            $table->string('gender')->nullable();
            $table->string('level')->nullable();
            $table->string('department')->nullable();
            $table->string('faculty')->nullable();
            $table->string('street_name')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('country')->nullable();
            $table->text('bio')->nullable();
            $table->date('d_o_b')->nullable();
            $table->string('phone')->nullable();
            $table->string('username')->nullable();
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
