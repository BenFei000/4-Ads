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

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');

Route::get('/search', function () {
    return view('search.box');
});

Route::get('/create/advertisement', 'AdController@showCreateAd');

Route::post('/create/advertisement', 'AdController@createAd');

Route::get('/add/category', 'AdminController@showAddCategory');

Route::post('/add/main/category', 'AdminController@addMainCategory');

Route::post('/add/sub/category', 'AdminController@addSubCategory');

Route::post('/get/sub/categories', 'AdController@getSubCategories');
