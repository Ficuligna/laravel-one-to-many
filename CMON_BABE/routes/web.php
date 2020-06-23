<?php

use Illuminate\Support\Facades\Route;



Route::get('/', "TaskController@index")->name("home");
Route::get('/edit/{id}', "TaskController@edit")->name("edit_task");
Route::post('/update/{id}', "TaskController@update")->name("update_task");
Route::get('/delete/{id}', "TaskController@delete")->name("delete_task");
Route::get('/create', "TaskController@create")->name("create_task");
Route::post('/store', "TaskController@store")->name("store_task");
Route::get('/show/{id}', "TaskController@show")->name("show_all_tasks");
