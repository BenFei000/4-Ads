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

/*Route::get('/', function () {
    $Advertisments=\App\Advertisement::orderBy('created_at','desc')->get();
    return view('welcome',compact('Advertisments'));
});*/

Route::get('/', function (){
    return view('home');
});
/*Route::get('/', function (){
    if(Auth::user()==null)
    return view('home');
});*/
Route::auth();

Route::get('/home', 'HomeController@index');
Route::get('/mywishes', 'AdController@myWishes');
Route::get('/search', 'AdController@getSearchView');

Route::get('/getsearchcategory',[
    'uses'=>'AdController@showCategoryResults',
    'as' =>'getsearchcategory'
]);
Route::post('/getsearchresult',[
    'uses'=>'AdController@showSearchResults',
    'as' =>'getsearchresult'
]);

Route::get('/create/advertisement', 'AdController@showCreateAd');

Route::get('/ajax', [
   'uses' =>'AdController@getSelectedCategory',
        'as' =>'ajax'
]
);

Route::post('/create/advertisement', 'AdController@createAd');

Route::get('/add/category', 'AdminController@showAddCategory');

Route::post('/add/main/category', 'AdminController@addMainCategory');

Route::post('/add/sub/category', 'AdminController@addSubCategory');
