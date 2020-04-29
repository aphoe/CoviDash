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

Auth::routes(['register' => false]);

Route::get('/home', 'Backend\DashboardController@index')->name('home');

Route::prefix('/')
    ->group(function (){
        Route::get('/', 'Front\HomeController@index');
        Route::get('news', 'Front\NewsItemsController@index');
    });

Route::get('license',  'LicenseController@index');

Route::prefix('setup')
    ->group(function (){
        Route::get('/', 'Setup\SetupController@create');
        Route::post('/', 'Setup\SetupController@store');
    });

Route::prefix('profile')
    ->group(function(){
        Route::prefix('setting')
            ->group(function(){
                Route::get('/', 'User\Profile\SettingsController@edit');
                Route::put('user', 'User\Profile\UserController@update');
                Route::put('password', 'User\Profile\PasswordController@update');
            });
    });

Route::prefix('demo')
    ->group(function(){
        Route::get('theme', 'DemoController@theme');
        Route::get('auth', 'DemoController@auth');
    });
