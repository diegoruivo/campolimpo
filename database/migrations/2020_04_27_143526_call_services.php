<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CallServices extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('call_services', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('call');
            $table->unsignedInteger('service');
            $table->timestamps();

            $table->foreign('call')->references('id')->on('calls')->onDelete('CASCADE');
            $table->foreign('service')->references('id')->on('services')->onDelete('CASCADE');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
