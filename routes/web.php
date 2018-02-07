<?php

Route::redirect('/courseUnits', '/');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/spreadsheets', 'SpreadsheetsController@index');
Route::get('/spreadsheets/create', 'SpreadsheetsController@create');
Route::post('/spreadsheets', 'SpreadsheetsController@store');
Route::get('/spreadsheets/{id}/marks', 'SpreadsheetsController@show');
