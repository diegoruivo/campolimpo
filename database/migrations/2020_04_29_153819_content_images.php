<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ContentImages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('content_images', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('page');
            $table->unsignedInteger('content');
            $table->string('path');
            $table->boolean('cover')->nullable();
            $table->timestamps();

            $table->foreign('page')->references('id')->on('pages')->onDelete('CASCADE');
            $table->foreign('content')->references('id')->on('page_contents')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('content_images');
    }
}
