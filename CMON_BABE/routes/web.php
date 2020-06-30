<?php

use Illuminate\Support\Facades\Route;



Route::get('/', "TaskController@index")->name("home1");
Route::get('/edit/{id}', "ProfileController@edit")->name("edit_task");
Route::post('/update/{id}', "ProfileController@update")->name("update_task");
Route::get('/delete/{id}', "ProfileController@delete")->name("delete_task");
Route::get('/create', "ProfileController@create")->name("create_task");
Route::post('/store', "ProfileController@store")->name("store_task");
Route::get('/show/{id}', "EmployeeController@show")->name("show_all_tasks");
Route::get('/delete_emp/{id}', "ProfileController@delete_emp")->name("delete_emp");
Route::get('/edit_emp/{id}', "ProfileController@edit_emp")->name("edit_emp");
Route::post('/update_emp/{id}', "ProfileController@update_emp")->name("update_emp");

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/profile_edit', 'ProfileController@edit_profile')->name('profile_edit');
Route::post('/profile_update', 'ProfileController@upload_profile')->name('upload_profile');
