<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->primary(); // API's user_id
            $table->string('email')->unique();
            $table->string('name')->nullable();
            $table->string('user_type')->nullable();
            $table->unsignedBigInteger('waba_id')->nullable();
            $table->unsignedBigInteger('phone_number_id')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}