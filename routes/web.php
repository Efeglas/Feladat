<?php

use App\Emails;

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
/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/', 'AdminController@login');
Route::post('/logincheck', 'AdminController@logincheck');
Route::get('/loginsuccess', 'AdminController@loginsuccess');
Route::get('/logout', 'AdminController@logout');

Route::resource('/emails', 'EmailController');

Route::get('/sendMail', 'AdminController@sendMail')->name('sendMail');