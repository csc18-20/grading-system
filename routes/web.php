<?php

// Route::redirect('/courseUnits', '/');
// Auth::logOut();
Route::get('/', function () {
	return App\User::all();
    return view('home');
});
Auth::routes();

Route::get("logout","Auth\LoginController@logout");

//resource routes
Route::resource('/spreadsheets', 'SpreadsheetsController');
Route::resource("/students","StudentsController");
Route::resource("/marks", 'MarksController');
Route::get('/home', 'HomeController@index')->name('home');
