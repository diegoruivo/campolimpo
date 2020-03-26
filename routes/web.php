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

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'as' => 'admin.'], function(){

    /** Formulário de Login*/
    Route::get('/', 'AuthController@showLoginForm')->name('login');
    Route::post('login', 'AuthController@login')->name('login.do');

    /** Rotas Protegidas */
    Route::group(['middleware' => ['auth']], function (){

        /** Dashboard Home */
        Route::get('home', 'AuthController@home')->name('home');

        /** Usuários */
        Route::get('users/team', 'UserController@team')->name('users.team');
        Route::resource('users', 'UserController');

        /** Empresas */
        Route::resource('companies', 'CompanyController');

        /** Propriedade */
        Route::post('properties/image-set-cover', 'PropertyController@imageSetCover')->name('properties.imageSetCover');
        Route::delete('properties/image-remove', 'PropertyController@imageRemove')->name('properties.imageRemove');
        Route::resource('properties', 'PropertyController');

        /** Documents */
        Route::get('documents/trashed', 'DocumentController@trashed')->name('documents.trashed');
        Route::get('documents/{document}/restore', 'DocumentController@restore')->name('documents.restore');
        Route::delete('documents/{document}/forceDelete', 'DocumentController@forceDelete')->name('documents.forceDelete');

        Route::resource('documents', 'DocumentController');
        Route::resource('document_category', 'DocumentCategoryController');

        /** Services */
        Route::resource('services', 'ServiceController');
        Route::resource('service_category', 'ServiceCategoryController');

        /** Contracts */
        Route::resource('contracts', 'ContractController');


    });

    /** Logout */
    Route::get('logout', 'AuthController@logout')->name('logout');

});