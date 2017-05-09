<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::resource('/', 'PublicController@index');
Route::resource('/create', 'PublicController@create');
Route::auth();


Route::resource('/public', 'PublicController');

Route::resource('/page', 'PagesController');
Route::resource('/user', 'UsersController');
Route::resource('/article', 'ArticlesController');
Route::resource('/css', 'CssTemplatesController');
Route::resource('/content', 'ContentAreasController');