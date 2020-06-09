<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('icon')->nullable();
            $table->string('slug')->nullable();
            $table->double('price', 10, 2)->nullable();
            $table->double('cost', 10, 2)->nullable();
            $table->text('description')->nullable();
            $table->boolean('cover')->nullable();
            $table->boolean('position')->nullable();
            $table->boolean('contract')->nullable();

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
        Schema::dropIfExists('services');
    }
}
