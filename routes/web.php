<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
// =======================BACKEND==========================================
Route::post('/logins', 'Auth\LoginController@login')->name('login');
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
// =======================LOGIN============================================
Route::get('/admin', 'Auth\LoginController@index')->name('admin')->middleware('authcek');
Route::get('/dashboard', 'Backend\BackendController@index')->name('dashboard')->middleware('ceklogin');
// =======================ENGINE============================================
Route::get('/akses', 'Engine\AksesController@index')->name('akses')->middleware('ceklogin');

// CRUD MENU LEVEL 1
Route::get('/menu-engine', 'Engine\EngineController@index')->name('menu-engine')->middleware('ceklogin');
Route::get('/menu-engine/add', 'Engine\EngineController@add')->name('menu-engine.add')->middleware('ceklogin');
Route::get('/menu-engine/edit/{id}', 'Engine\EngineController@edit')->name('menu-engine.edit')->middleware('ceklogin');
Route::post('/menu-engine/save', 'Engine\EngineController@save')->name('menu-engine.save')->middleware('ceklogin');
Route::delete('/menu-engine/delete/{id}', 'Engine\EngineController@destroy')->name('menu-engine.delete');

// PENGATURAN HAK AKSES
Route::post('/akses/insert', 'Engine\AksesController@saveInsert')->name('akses.insert')->middleware('ceklogin');
Route::post('/akses/delete', 'Engine\AksesController@saveDelete')->name('akses.delete')->middleware('ceklogin');


