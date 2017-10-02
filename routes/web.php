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

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home/add', 'HomeController@add')->name('add');
Route::post('/home/store', 'HomeController@store')->name('store');

Route::resource('/home', 'HomeController');

Route::get('/home/edit/{parameter}',[
    'uses' => 'HomeController@edit',
    'as'   => 'edit'
]);

Route::get('/home/delete/{parameter}',[
    'uses' => 'HomeController@delete',
    'as'   => 'delete'
]);

Route::post('/home/update/{parameter}',[
    'uses' => 'HomeController@update',
    'as'   => 'update'
]);