<?php
use Illuminate\Support\Facades\Route;

Route::get('/', 'Backend\DashboardController@index');

Route::get('province/status', 'Backend\ProvincesStatusController@update');
Route::resource('province', 'Backend\ProvincesController');

Route::get('incidence/bulk/create', 'Backend\IncidencesBulkController@create');
Route::post('incidence/bulk/create', 'Backend\IncidencesBulkController@store');
Route::resource('incidence', 'Backend\IncidencesController');

Route::get('user/block', 'Backend\UsersBlockController@update');
Route::resource('user', 'Backend\UsersController');

Route::get('url/status', 'Backend\UrlsStatusController@update');
Route::resource('url', 'Backend\UrlsController');
