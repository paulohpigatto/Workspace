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
  return view('index');
});

Route::get('/index', function () {
  return view('index');
});

Route::get('/fornecedor', function () {
  return view('dashboard.vendorDashboard');
});

Route::get('/compras', function () {
  return view('buyerIndex');
});

Route::get('/comprador', function () {
  return view('dashboard.buyerDashboard');
});

Route::auth();

Route::get('/logout', function(){
  Auth::logout();

  return redirect('/');
});

Auth::routes();

Route::post('/auth','UserController@login');
Route::post('/authVendor','UserController@loginVendor');
