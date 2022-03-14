<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/table-basic', function () {
    return view('table-basic');
});
Route::get('/table-dataTable', function () {
    return view('table-dataTable');
});
Route::get('/table-editable', function () {
    return view('table-dataTable');
});

Route::get('/msg-inbox', function () {
    return view('msg-inbox');
});
