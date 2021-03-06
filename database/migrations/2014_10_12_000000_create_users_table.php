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
            $table->bigIncrements('id');
            $table->string('name', 255);
            $table->enum('role', ['admin', 'end_user'])->default('end_user');
            $table->string('email', 255);
            $table->string('country', 255)->nullable();
            $table->string('state', 255)->nullable();
            $table->string('city', 255)->nullable();
            $table->string('address', 255)->nullable();
            $table->string('password', 255);
            $table->enum('status', ['active', 'deactive'])->default('active');
            $table->rememberToken();
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
