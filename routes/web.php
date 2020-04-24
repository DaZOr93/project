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

Route::get('/', 'WorkController@list')->name('work.list');
Route::get('/mywork', 'WorkController@my_work')->name('work.my');
Route::get('/list/{work}', 'WorkController@show')->name('work.show');
Route::get('/list/{work}/edit', 'WorkController@edit')->name('work.edit');

Route::post('/list/{work}/update', 'WorkController@update')->name('work.update');
Route::get('/about', 'WorkController@about');
Route::get('/create', 'WorkController@create')->name('work.create')->middleware(['auth', 'role:2']);;
Route::post('/create/store', 'WorkController@store')->name('work.store');
Route::post('/create/rating{work}', 'WorkController@rating')->name('work.rating');
Route::resource('work', 'WorkController');

Route::name('dashboard.')
    ->namespace('Dashboard')
    ->prefix('dashboard')
    ->group(function () {



        Route::namespace('Users')
            ->group(function () {
                Route::resource('users', 'UserController')->middleware(['auth', 'role:1']);
                Route::get('/', 'UserController@index')->middleware(['auth', 'role:1']);
            });
    });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
