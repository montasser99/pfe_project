<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\AbsenceController;
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

/**Route de controller Welcome**/
Route::resource('/', WelcomeController::class);

/**Route de controller Absence**/
Route::resource('/absences', AbsenceController::class);



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

/**routes pour les controller routes**/
Auth::routes();

/**Route de controller Home de login**/
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
