<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuthorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('authors', function (Blueprint $table) {
            $table->id('atr_id');
            $table->string('atr_name');
            $table->string('atr_last_name');
            $table->string('atr_email');
            $table->string('atr_phone_number', 15);
            $table->text('atr_bio');
            $table->string('atr_photo');
            $table->dateTime('atr_created_at');
            $table->dateTime('atr_updated_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('authors');
    }
}
