<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHashtagCrawlTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hashtag_crawl', function (Blueprint $table) {
            $table->increments('id');
            $table->string('hashtag')->nullable();
            $table->integer('hashtag_id')->nullable(); //references id on hashtag table
            $table->string('username')->nullable();
            $table->string('tweet')->nullable();
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
        Schema::dropIfExists('hashtag_crawl');
    }
}
