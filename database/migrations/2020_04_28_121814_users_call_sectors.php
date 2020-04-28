<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UsersCallSectors extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_call_sectors', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('sector');
            $table->unsignedInteger('user');
            $table->timestamps();

            $table->foreign('sector')->references('id')->on('call_sectors')->onDelete('CASCADE');
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
        //
    }
}
