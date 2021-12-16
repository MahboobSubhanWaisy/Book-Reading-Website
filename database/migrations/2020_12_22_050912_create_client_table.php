<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id('clt_id');
            $table->string('clt_name');
            $table->string('clt_email');
            $table->dateTime('clt_email_verified_at')->nullable();
            $table->string('clt_password', 100);
            $table->string('clt_remember_token',100)->nullable();
            $table->string('clt_image')->nullable();
            $table->dateTime('clt_created_at');
            $table->dateTime('clt_updated_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clients');
    }
}
