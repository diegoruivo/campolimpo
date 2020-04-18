<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDapsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daps', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user');
            $table->string('dap_number')->nullable();
            $table->string('county')->nullable();
            $table->string('state')->nullable();
            $table->date('validity')->nullable();
            $table->string('category')->nullable();
            $table->string('framework')->nullable();
            $table->timestamps();

            $table->foreign('user')->references('id')->on('users')->onDelete('CASCADE');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('daps');
    }
}
