<?php
use Illuminate\Support\Facades\Route;

Route::get('/', 'Backend\DashboardController@index');

Route::resource('province', 'Backend\ProvincesController');
