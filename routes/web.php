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

Auth::routes(['verify' => true]);
Route::get('i18n/{lang}', 'HomeController@changeLang')->name('language.change');
Route::get('/', 'HomeController@welcome')->name('welcome');
Route::get('contact', 'ContactController@create')->name('contact.create');
Route::post('contact', 'ContactController@store')->name('contact.store');
Route::get('contact/{id}', 'ContactController@show')->name('contact.show');
Route::get('/home', 'HomeController@index')->name('home');
