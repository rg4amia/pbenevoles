<?php

use App\Http\Controllers\Backend\AuthenticateController;
use App\Http\Controllers\Backend\DashboardController;
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
    Route::post('/inscription', 'store')->name('store');
    Route::get('/get-badge/{matricule}', 'badgepdf')->name('badgepdf');
});


Route::middleware(['auth'])->group(function () {

    Route::prefix('dashboard')->name('dashboard.')->controller(DashboardController::class)->group(function () {
        Route::get('/', 'index')->name('index');
    });
});

Route::name('authenticate.')->prefix('authenticate')->controller(AuthenticateController::class)->group(function () {
    Route::get('/', 'login')->name('login');
});

Route::group(['prefix' => 'api-couverture', 'as' => 'api-couverture.'], function () {
    Route::get('/', [BenevoleController::class, 'selecteDistricRegion'])->name('selecteDistricRegion');
});


