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

// da wir nur vue routes nutzen, wird eine neue geladene Seite mit korrektem Link
// einen 404 verursachen. Um das zu verhindern, fuegen wir hier eine "Blanko"-Seite
// zu, die immer auf Index steuert fuer alle Seiten, spezifiziert ueber RegEx
// auf Index greift Vue zu 
Route::get('{path}', 'HomeController@index')->where('path', '([A-z\d-\/_.]+)?');
