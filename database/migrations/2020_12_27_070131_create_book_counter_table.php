<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookCounterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_counters', function (Blueprint $table) {
            $table->id('bc_id');
            $table->bigInteger('bc_book_id');
            $table->bigInteger('bc_client_id')->nullable();
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
        Schema::dropIfExists('book_counters');
    }
}
