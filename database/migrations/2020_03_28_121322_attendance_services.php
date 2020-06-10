<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AttendanceServices extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attendance_services', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('attendance');
            $table->unsignedInteger('service');
            $table->text('description')->nullable();
            $table->timestamps();

            $table->foreign('attendance')->references('id')->on('attendances')->onDelete('CASCADE');
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
