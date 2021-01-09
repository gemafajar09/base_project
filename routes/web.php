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


// CRUD MENU LEVEL 1
Route::get('/menu-engine', 'Engine\EngineController@index')->name('menu-engine')->middleware('ceklogin');
Route::get('/menu-engine/add', 'Engine\EngineController@add')->name('menu-engine.add')->middleware('ceklogin');
Route::get('/menu-engine/edit/{id}', 'Engine\EngineController@edit')->name('menu-engine.edit')->middleware('ceklogin');
Route::post('/menu-engine/save', 'Engine\EngineController@save')->name('menu-engine.save')->middleware('ceklogin');
Route::delete('/menu-engine/delete/{id}', 'Engine\EngineController@destroy')->name('menu-engine.delete');