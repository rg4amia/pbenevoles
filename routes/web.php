<?php

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
});


