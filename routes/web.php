<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::group(['namespace' => 'Web', 'as' => 'web.'], function() {

    /** Home Page Site */
    Route::get('/', 'WebController@home')->name('home');

});


Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'as' => 'admin.'], function(){

    /** Formulário de Login*/
    Route::get('/', 'AuthController@showLoginForm')->name('login');
    Route::post('login', 'AuthController@login')->name('login.do');

    /** Rotas Protegidas */
    Route::group(['middleware' => ['auth']], function (){

        /** Painel de Controle */
        Route::get('home', 'AuthController@home')->name('home');

        /** Atendimento */
        Route::resource('calls', 'CallController');

        /** Setores de Atendimento */
        Route::resource('call_sectors', 'CallSectorController');

        /** Usuários */
        Route::get('users/team', 'UserController@team')->name('users.team');
        Route::resource('users', 'UserController');

        /** Empresas */
        Route::resource('companies', 'CompanyController');

        /** Propriedade */
        Route::post('properties/image-set-cover', 'PropertyController@imageSetCover')->name('properties.imageSetCover');
        Route::delete('properties/image-remove', 'PropertyController@imageRemove')->name('properties.imageRemove');
        Route::resource('properties', 'PropertyController');

        /** Documentos */
        Route::get('documents/trashed', 'DocumentController@trashed')->name('documents.trashed');
        Route::get('documents/{document}/restore', 'DocumentController@restore')->name('documents.restore');
        Route::delete('documents/{document}/forceDelete', 'DocumentController@forceDelete')->name('documents.forceDelete');

        Route::resource('documents', 'DocumentController');
        Route::resource('document_category', 'DocumentCategoryController');

        /** Dados Bancários */
        Route::resource('accounts', 'AccountController');

        /** DAP */
        Route::resource('daps', 'DapController');

        /** Propriedades Rurais */
        Route::resource('rural_properties', 'RuralPropertyController');

        /** Cadastro Ambiental Rural  */
        Route::resource('rural_environmental_registrations', 'RuralEnvironmentalRegistryController');

        /** Serviços */
        Route::resource('services', 'ServiceController');
        Route::resource('service_category', 'ServiceCategoryController');

        /** Contracts */
        Route::resource('contracts', 'ContractController');

        /** Settings */
        Route::resource('system', 'SystemController');
        Route::resource('banks', 'BankController');


    });

    /** Logout */
    Route::get('logout', 'AuthController@logout')->name('logout');

});