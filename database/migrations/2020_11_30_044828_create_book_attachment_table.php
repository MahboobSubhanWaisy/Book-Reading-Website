<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookAttachmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_attachments', function (Blueprint $table) {
            $table->id('at_id');
            $table->integer('at_book_id');
            $table->string('at_name');
            $table->string('at_attachement');
            $table->string('at_type',10);
            $table->dateTime('at_created_at');
            $table->dateTime('at_updated_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('book_attachments');
    }
}
