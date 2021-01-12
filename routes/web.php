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
// Route::get('/menu-engine', 'Engine\EngineController@index')->name('menu-engine')->middleware('ceklogin');
// Route::get('/menu-engine/add', 'Engine\EngineController@add')->name('menu-engine.add')->middleware('ceklogin');
// Route::get('/menu-engine/edit/{id}', 'Engine\EngineController@edit')->name('menu-engine.edit')->middleware('ceklogin');
// Route::post('/menu-engine/save', 'Engine\EngineController@save')->name('menu-engine.save')->middleware('ceklogin');
// Route::delete('/menu-engine/delete/{id}', 'Engine\EngineController@destroy')->name('menu-engine.delete');

// PENGATURAN HAK AKSES
Route::post('/akses/insert', 'Engine\AksesController@saveInsert')->name('akses.insert')->middleware('ceklogin');
Route::post('/akses/delete', 'Engine\AksesController@saveDelete')->name('akses.delete')->middleware('ceklogin');

// CRUD ROUTER
Route::get('/router', 'Engine\RouterController@index')->name('router')->middleware('ceklogin');
Route::get('/router/add', 'Engine\RouterController@add')->name('router.add')->middleware('ceklogin');
Route::get('/router/edit/{id}', 'Engine\RouterController@edit')->name('router.edit')->middleware('ceklogin');
Route::post('/router/save', 'Engine\RouterController@save')->name('router.save')->middleware('ceklogin');
Route::delete('/router/delete/{id}', 'Engine\RouterController@destroy')->name('router.delete');


//panggil session router
foreach(session()->get('router') as $router){
    if($router->router_name == NULL AND $router->router_middleware == NULL){
        Route::$router->router_type . "('" . $router->router_url ."', '" . $router->router_controller . "')";
    }elseif($router->router_name != NULL AND $router->router_middleware == NULL){
        Route::$router->router_type . "('" . $router->router_url ."' ,'" . $router->router_controller . "')->name('". $router->router_name . "')";
    }elseif($router->router_name != NULL AND $router->router_middleware != NULL){
        Route::$router->router_type . "('" . $router->router_url ."', '" . $router->router_controller . "')->name('" . $router->router_name. "')->middleware('" .$router->router_middleware . "')";
    }
}

