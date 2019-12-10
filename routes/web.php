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

Route::redirect('/', '/home', 301)->name('welcome');
Route::get('/home', 'HomeController@index')->name('home');

Route::get('users', 'UserController@index')->name('users.index');
Route::resource('contacts', 'ContactController')->except(['index']);
Route::delete('contacts/{contact}/hard','ContactController@hardDestroy')->name('contacts.hard.destroy');
Route::get('contacts/{contact}/hard','ContactController@restore')->name('contacts.restore');
Route::get('trash', 'UserController@trash')->name('trash');
