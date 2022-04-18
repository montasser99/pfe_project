<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\AbsenceController;
use App\Http\Controllers\PersonnelController;
use App\Http\Controllers\PointageController;
use App\Http\Controllers\DemandeCongeController;
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


/**Route de controller Absence**/
Route::resource('/absences', AbsenceController::class);

Route::resource('/personnels',PersonnelController::class);

Route::resource('/pointages',PointageController::class);

Route::resource('/Demandeconges',DemandeCongeController::class);

Route::put('{id}', [PersonnelController::class,'Update_Image'])->name('imageModifier')->middleware('auth');

/** page de profil **/
Route::get('/profil', function (){
return view ('profil-personnel');
})->middleware('auth');




Route::get('/table-basic', function () {
    return view('table-basic');
})->middleware('auth');

Route::get('/msg-inbox', function () {
    return view('msg-inbox');
});

/**routes pour les controller auth routes**/
Auth::routes();

/**Route de controller Home de login**/
//**name('home'); => c'est le Rdirect::HOME in controller Auth et '/' pour return dirctement aux template

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
