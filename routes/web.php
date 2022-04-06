<?php

use App\Http\Controllers\CarBrandController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\CarModelController;
use App\Http\Controllers\CarTypeController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ServiceItemController;
use App\Http\Controllers\ServiceItemPriceController;
use App\Http\Controllers\ServicePriceController;
use App\Http\Controllers\WashingController;
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

Route::group([
    'middleware' => ['auth']
], function(){

    Route::get('/dashboard', [IndexController::class, 'index'])->name('dashboard');

    Route::resource('managers', ManagerController::class)->except(['show']);
    Route::resource('services', ServiceController::class)->except(['show']);
    Route::resource('service-items', ServiceItemController::class)->except(['show']);
    Route::resource('car-types', CarTypeController::class)->except(['show']);
    Route::resource('car-models', CarModelController::class)->except(['show']);
    Route::resource('car-brands', CarBrandController::class)->except(['show']);
    Route::resource('cars', CarController::class);
    // Route::resource('service-prices', ServicePriceController::class);
    // Route::resource('service-item-prices', ServiceItemPriceController::class);
    Route::resource('washings', WashingController::class);
});

require __DIR__.'/auth.php';
