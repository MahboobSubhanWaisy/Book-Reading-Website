<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookRatingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_rating', function (Blueprint $table) {
            $table->id('br_id');
            $table->bigInteger('br_book_id');
            $table->bigInteger('br_client_id');
            $table->tinyInteger('br_rating_number');
            $table->string('br_comment');
            $table->dateTime('br_created_at');
            $table->dateTime('br_updated_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('book_rating');
    }
}
