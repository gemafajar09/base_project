<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
// =======================BACKEND==========================================
Route::post('/logins', 'LoginController@login')->name('login');
Route::get('/logout', 'LoginController@logout')->name('logout');
// =======================================================================
Route::get('/admin', 'LoginController@index')->name('admin')->middleware('authcek');
Route::get('/dashboard', 'BackendController@index')->name('dashboard')->middleware('ceklogin');
