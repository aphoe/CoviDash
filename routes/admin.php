<?php
use Illuminate\Support\Facades\Route;

Route::get('/', 'Backend\DashboardController@index');

Route::get('province/status', 'Backend\ProvincesStatusController@update');
Route::resource('province', 'Backend\ProvincesController');
