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

/*
    Route::get('/', function () {
    // return view('welcome');
    return '<h1>Hello World!</h1>';
    });

    // When the url is 'url/hello' the below will be shown
    Route::get('/hello', function () {
    return '<h1>Hello World! Hello World!</h1>';
    });


    // When the url is 'url/about' the page below will be shown
    Route::get('/about', function () {
    return view('pages.about');
    //OR
    //return view('pages/about');
    });

    //Dynamically inserts the user id and name in the url
    // and displays it below
    Route::get('/users/{id}/{name}', function ($id, $name) {
    return 'This is user of id '.$id.' with the name '.$name;
    });
*/

// Shows the output of the function 'index' in the PageController
Route::get('/', 'PageController@index');

Route::get('/about', 'PageController@about');

Route::get('/services', 'PageController@services');

//Creating all the routes for the PostController resource methods
Route::resource('posts', 'PostController');

Auth::routes();

Route::get('/dashboard', 'DashboardController@index');
