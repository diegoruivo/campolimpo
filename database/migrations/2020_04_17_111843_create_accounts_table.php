<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user');
            $table->unsignedInteger('bank');
            $table->string('owner')->nullable();
            $table->string('agency')->nullable();
            $table->string('agency_dv')->nullable();
            $table->string('account')->nullable();
            $table->string('account_dv')->nullable();
            $table->string('assignor_count')->nullable();
            $table->string('assignor_count_dv')->nullable();
            $table->string('wallet')->nullable();
            $table->timestamps();

            $table->foreign('user')->references('id')->on('users')->onDelete('CASCADE');
            $table->foreign('bank')->references('id')->on('banks')->onDelete('CASCADE');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('accounts');
    }
}
