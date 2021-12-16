<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id('ct_id');
            $table->string('ct_title');
            $table->string('ct_description',100)->nullable();
            $table->string('ct_title_dari');
            $table->string('ct_description_dari',100)->nullable();
            $table->sting('ct_title_pashto');
            $table->string('ct_description_pashto',100)->nullable();
            $table->dateTime('ct_created_at');
            $table->dateTime('ct_updated_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
