<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ServiceDocuments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_documents', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('document_category');
            $table->unsignedInteger('service');
            $table->timestamps();

            $table->foreign('document_category')->references('id')->on('document_categories')->onDelete('CASCADE');
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
