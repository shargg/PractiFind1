<?php

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

Auth::routes();

Route::get('/', 'HomeController@index');
Route::get('home', 'HomeController@index');
Route::get('job_detail/{id}', 'HomeController@job_detail');
Route::post('apply_job', 'HomeController@apply_job');
Route::post('job_update', 'HomeController@job_update');
Route::get('chat', 'ChatsController@index');
Route::get('messages', 'ChatsController@fetchMessages');
Route::post('messages', 'ChatsController@sendMessage');
Route::get('modules', 'HomeController@modules');
Route::get('modules/{id}', 'HomeController@module_detail');
Route::post('place_bid', 'HomeController@place_bid');
Route::get('create_module', 'HomeController@create_module')->middleware('admin');
Route::post('create_module', 'HomeController@save_module')->middleware('admin');
Route::get('post_job', 'HomeController@post_job')->middleware('admin');
Route::post('post_job', 'HomeController@save_job')->middleware('admin');
Route::get('users', 'HomeController@users')->middleware('admin');
Route::get('users/edit/{id}', 'HomeController@edit_user')->middleware('admin');
Route::post('users/edit/{id}', 'HomeController@update_user')->middleware('admin');
Route::get('users/delete/{id}', 'HomeController@delete_user')->middleware('admin');
