<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id('bk_id');
            $table->integer('bk_category_id');
            $table->integer('bk_author_id');
            $table->string('bk_title');
            $table->text('bk_description');
            $table->date('bk_publish_date');
            $table->string('bk_cover_photo');
            $table->string('bk_title_pashto');
            $table->text('bk_description_pashto');
            $table->string('bk_cover_photo_pashto');
            $table->string('bk_title_dari');
            $table->text('bk_description_dari');
            $table->string('bk_cover_photo_dari');
            $table->string('bk_file_type');
            $table->string('bk_file_location');
            $table->string('bk_region')->nullable();
            $table->dateTime('bk_created_at');
            $table->dateTime('bk_updated_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
}
