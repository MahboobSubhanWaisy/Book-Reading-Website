<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id('u_id');
            $table->string('u_name');
            $table->string('u_lastname');
            $table->string('u_email',64)->unique();
            $table->dateTime('u_email_verified_at')->nullable();
            $table->string('u_password');
            $table->string('u_image')->nullable();
            $table->rememberToken();
            $table->dateTime('u_created_at');
            $table->dateTime('u_updated_at');
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
