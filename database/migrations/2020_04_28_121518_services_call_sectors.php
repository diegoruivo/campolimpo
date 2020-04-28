<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ServicesCallSectors extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services_call_sectors', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('sector');
            $table->unsignedInteger('service');
            $table->timestamps();

            $table->foreign('sector')->references('id')->on('call_sectors')->onDelete('CASCADE');
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
