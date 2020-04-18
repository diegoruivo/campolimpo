<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRuralPropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rural_properties', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user');
            $table->string('nirf_number')->nullable();
            $table->string('ccir_number')->nullable();
            $table->string('rural_property')->nullable();
            $table->string('area')->nullable();
            $table->string('domain_type')->nullable();
            $table->string('domain_document')->nullable();
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
        Schema::dropIfExists('rural_properties');
    }
}
