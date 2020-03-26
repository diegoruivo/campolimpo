<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {

            /** perfil */
            $table->boolean('small_rural_producer')->nullable();
            $table->boolean('medium_rural_producer')->nullable();
            $table->boolean('large_rural_producer')->nullable();

            /** data */
            $table->date('date_of_birth')->nullable();
            $table->string('place_of_birth')->nullable();
            $table->string('genre')->nullable();
            $table->string('civil_status')->nullable();
            $table->string('document')->unique();
            $table->string('document_secondary', 20)->nullable();
            $table->string('document_secondary_complement')->nullable();
            $table->string('cover')->nullable();

            /** address */
            $table->string('zipcode')->nullable();
            $table->string('street')->nullable();
            $table->string('number')->nullable();
            $table->string('complement')->nullable();
            $table->string('neighborhood')->nullable();
            $table->string('state')->nullable();
            $table->string('city')->nullable();

            /** contact */
            $table->string('telephone')->nullable();
            $table->string('cell')->nullable();

            /** income */
            $table->string('occupation')->nullable();
            $table->double('income', 10, 2)->nullable();
            $table->string('company_work')->nullable();

            /** spouse */
            $table->string('type_of_communion')->nullable();
            $table->string('spouse_name')->nullable();
            $table->date('spouse_date_of_birth')->nullable();
            $table->string('spouse_place_of_birth')->nullable();
            $table->string('spouse_genre')->nullable();
            $table->string('spouse_document')->nullable();
            $table->string('spouse_document_secondary')->nullable();
            $table->string('spouse_document_secondary_complement')->nullable();

            /** income spouse */
            $table->string('spouse_occupation')->nullable();
            $table->string('spouse_income')->nullable();
            $table->string('spouse_company_work')->nullable();

            /** organization  */
            $table->string('organized_group')->nullable();
            $table->string('organized_group_type')->nullable();
            $table->string('organized_group_name')->nullable();

            /** access */
            $table->boolean('admin')->nullable();
            $table->boolean('client')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {

            /** perfil */
            $table->dropColumn('small_rural_producer');
            $table->dropColumn('medium_rural_producer');
            $table->dropColumn('large_rural_producer');

            /** data */
            $table->dropColumn('date_of_birth');
            $table->dropColumn('place_of_birth');
            $table->dropColumn('place_of_birth');
            $table->dropColumn('genre');
            $table->dropColumn('civil_status');
            $table->dropColumn('document');
            $table->dropColumn('document_secondary');
            $table->dropColumn('document_secondary_complement');
            $table->dropColumn('cover');

            /** address */
            $table->dropColumn('zipcode');
            $table->dropColumn('street');
            $table->dropColumn('number');
            $table->dropColumn('complement');
            $table->dropColumn('neighborhood');
            $table->dropColumn('state');
            $table->dropColumn('city');

            /** contact */
            $table->dropColumn('telephone');
            $table->dropColumn('cell');

            /** income */
            $table->dropColumn('occupation');
            $table->dropColumn('income');
            $table->dropColumn('company_work');

            /** spouse */
            $table->dropColumn('type_of_communion');
            $table->dropColumn('spouse_name');
            $table->dropColumn('spouse_date_of_birth');
            $table->dropColumn('spouse_place_of_birth');
            $table->dropColumn('spouse_genre');
            $table->dropColumn('spouse_document');
            $table->dropColumn('spouse_document_secondary');
            $table->dropColumn('spouse_document_secondary_complement');

            /** income spouse */
            $table->dropColumn('spouse_occupation');
            $table->dropColumn('spouse_income');
            $table->dropColumn('spouse_company_work');

            /** organization  */
            $table->dropColumn('organized_group');
            $table->dropColumn('organized_group_type');
            $table->dropColumn('organized_group_name');

            /** access */
            $table->dropColumn('admin');
            $table->dropColumn('client');

        });
    }
}
