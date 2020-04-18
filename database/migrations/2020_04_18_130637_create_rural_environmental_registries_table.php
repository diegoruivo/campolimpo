<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRuralEnvironmentalRegistriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rural_environmental_registries', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user');
            $table->string('car_number')->nullable();
            $table->string('property_name')->nullable();
            $table->string('county')->nullable();
            $table->string('uf')->nullable();
            $table->date('register_date')->nullable();
            $table->string('property_code_mma')->nullable();
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
        Schema::dropIfExists('rural_environmental_registries');
    }
}
