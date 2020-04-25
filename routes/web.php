<?php

use Illuminate\Support\Facades\Route;

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

Route::get('license',  'LicenseController@index');

Route::prefix('setup')
    ->group(function (){
        Route::get('/', 'Setup\SetupController@create');
        Route::post('/', 'Setup\SetupController@store');
    });

Route::prefix('demo')
    ->group(function(){
        Route::get('theme', 'DemoController@theme');
    });
