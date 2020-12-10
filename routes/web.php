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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/usuarios', function () {
    return view('Usuarios');
})->name('usuarios');
Route::get('/productos', function () {
    return view('Productos');
})->name('productos');
Route::get('/ventas', function () {
    return view('Ventas');
})->name('ventas');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
