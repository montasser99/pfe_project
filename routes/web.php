<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\AbsenceController;
use App\Http\Controllers\PersonnelController;
use App\Http\Controllers\PointageController;
use App\Http\Controllers\DemandeCongeController;
use App\Http\Controllers\CongeController;
use Illuminate\Support\Facades\Auth;

/**Admin uses controllers**/
use App\Http\Controllers\AdminControllers\AbsenceAdminController;
use App\Http\Controllers\AdminControllers\PointageAdminController;
use App\Http\Controllers\AdminControllers\CongeAdminController;
use App\Http\Controllers\AdminControllers\DemandeCongeAdminController;

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



Route::resource('/absences', AbsenceController::class);

Route::resource('/personnels',PersonnelController::class);

Route::resource('/pointages',PointageController::class);

Route::resource('/Demandeconges',DemandeCongeController::class);

Route::resource('/conges',CongeController::class);

/**signataire work **/
Route::get('/statu/{annule}',['as'=>'annulerDemande','uses'=>'App\Http\Controllers\DemandeCongeController@annulerDemande'])->middleware('auth');
Route::get('/ajouterSigs/{id}',['as'=>'ajouterSignataire','uses'=>'App\Http\Controllers\DemandeCongeController@ajouterSignataire'])->middleware('auth');
Route::post('/ajouterSignataire/{id}', 'App\Http\Controllers\DemandeCongeController@storeSignataire')->name('storeSig')->middleware('auth');
Route::get('/editsignataire/{id}/{idIndex}','App\Http\Controllers\DemandeCongeController@editSignataire')->name('editSign');
Route::delete('/deleteSignataire/{id}','App\Http\Controllers\DemandeCongeController@destroySignataire')->name('destroySign');
Route::put('/updateSignataire/{id}','App\Http\Controllers\DemandeCongeController@updateSignataire')->name('updateSig');

/**Admin Routes **/
Route::resource('/absenceAdmin', AbsenceAdminController::class);
Route::resource('/pointageAdmin', PointageAdminController::class);
Route::resource('/congeAdmin',CongeAdminController::class);
Route::resource('/DemandeAdmin',DemandeCongeAdminController::class);

Route::post('personnelimage/{id}', [PersonnelController::class,'Update_Image'])->name('imageModifier')->middleware('auth');

//Route::resource('/pointages/admin',PointageController::class);

/** page de profil **/
Route::get('/profil', function (){
return view ('profil-personnel');
})->middleware('auth');

/** page de PDFDemande **/
Route::get('/demande', function (){
    return view ('demandecongepdf');
    })->middleware('auth');

/**routes pour les controller auth routes**/
Auth::routes();

/**Route de controller Home de login**/
//**name('home'); => c'est le Rdirect::HOME in controller Auth et '/' pour return dirctement aux template

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
