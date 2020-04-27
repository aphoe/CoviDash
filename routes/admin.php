<?php
use Illuminate\Support\Facades\Route;

Route::get('/', 'Backend\DashboardController@index');

Route::get('province/status', 'Backend\ProvincesStatusController@update');
Route::resource('province', 'Backend\ProvincesController');

Route::get('incidence/bulk/create', 'Backend\IncidencesBulkController@create');
Route::post('incidence/bulk/create', 'Backend\IncidencesBulkController@store');
Route::resource('incidence', 'Backend\IncidencesController');
