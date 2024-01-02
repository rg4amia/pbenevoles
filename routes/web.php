<?php

use App\Http\Controllers\Backend\AssociationController;
use App\Http\Controllers\Backend\AuthenticateController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\ParticulierController;
use App\Http\Controllers\BenevoleController;
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
//prefix('inscription')->name('inscription.')->
Route::controller(BenevoleController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::post('/liste', 'liste_beneficiaire')->name('liste');
    Route::post('/inscription', 'store')->name('store');
    Route::get('/get-badge/{matricule}', 'badgepdf')->name('badgepdf');
    Route::get('/reclamation', 'store_reclamation')->name('store.reclamation');
    Route::get('/liste', 'liste_beneficiaire')->name('liste.benef');
});

Route::prefix('dashboard')->name('dashboard.')->controller(DashboardController::class)->group(function () {
    Route::get('/', 'dasboard')->name('index');
});

Route::get('/admin', function (){
    return redirect()->intended('admin/particulier');
});

Route::middleware(['auth'])->prefix('admin')->group(function () {

  /*  Route::prefix('/dashboard')->name('dashboard.')->controller(DashboardController::class)->group(function () {
        Route::get('/', 'dasboard')->name('index');
    });*/

    Route::prefix('association')->name('association.')->controller(AssociationController::class)->group(function () {
        Route::get('/', 'index')->name('index');
    });

    Route::prefix('particulier')->name('particulier.')->controller(ParticulierController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('benevole/export-excel/{data?}', 'benevoleExportExcel')->name('benevoleexportexcel');
        Route::get('benevole/multiSearch/', 'multiSearch')->name('multisearch');
    });

     Route::prefix('beneficiaire')->name('beneficiaire.')->controller(ParticulierController::class)->group(function () {
        Route::get('/', 'beneficiaire')->name('index');
    });

     Route::prefix('reclamation')->name('reclamation.')->controller(ParticulierController::class)->group(function () {
        Route::get('/', 'reclamation')->name('index');
        Route::get('/traitement_reclamation/{reclamation_id}/{state}', 'traitement_reclamation')->name('traitement');
    });

    Route::prefix('utilisateur')->name('utilisateur.')->controller(AuthenticateController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/nouveau', 'nouvel_utilisateur')->name('nouveau');
    });

    Route::prefix('benevole')->name('benevole.')->controller(AuthenticateController::class)->group(function () {
        Route::get('/', 'index_benevole')->name('index');
        //Route::get('/traitement_reclamation/{reclamation_id}/{state}', 'traitement_reclamation')->name('traitement');
    });

    Route::prefix('chefequipe')->name('chefequipe.')->controller(AuthenticateController::class)->group(function () {
        Route::get('/', 'index_chefequipe')->name('index');
        //Route::get('/traitement_reclamation/{reclamation_id}/{state}', 'traitement_reclamation')->name('traitement');
    });

    Route::prefix('superviseur')->name('superviseur.')->controller(AuthenticateController::class)->group(function () {
        Route::get('/', 'index_superviseur')->name('index');
        //Route::get('/traitement_reclamation/{reclamation_id}/{state}', 'traitement_reclamation')->name('traitement');
    });

    Route::prefix('pointage')->name('pointage.')->controller(AuthenticateController::class)->group(function () {
        Route::get('/', 'index_pointage')->name('index');
        //Route::get('/traitement_reclamation/{reclamation_id}/{state}', 'traitement_reclamation')->name('traitement');
    });
});

Route::name('authenticate.')->prefix('authenticate')->controller(AuthenticateController::class)->group(function () {
    Route::get('/', 'login')->name('login');
    Route::post('/authenticate', 'authenticate')->name('auth');
    Route::post('/logout', 'logout')->name('logout');
});

Route::group(['prefix' => 'api-couverture', 'as' => 'api-couverture.'], function () {
    Route::get('/', [BenevoleController::class, 'selecteDistricRegion'])->name('selecteDistricRegion');
});


