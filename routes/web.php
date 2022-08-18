<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;

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

Auth::routes();

Route::get('/home', [
    HomeController::class, 'index'
])->name('home');

Route::get('index', [DashboardController::class, 'index'])->name('dashboard');



Route::resource('userstatuses', App\Http\Controllers\UserstatusController::class);


Route::resource('addresstypes', App\Http\Controllers\AddresstypesController::class);


Route::resource('partnertypes', App\Http\Controllers\PartnertypesController::class);


Route::resource('users', App\Http\Controllers\UsersController::class);


Route::resource('tables', App\Http\Controllers\TablesController::class);


Route::resource('phonenumbertypes', App\Http\Controllers\PhonenumbertypesController::class);


Route::resource('energyClassifications', App\Http\Controllers\EnergyClassificationsController::class);


Route::resource('equipmenttypes', App\Http\Controllers\EquipmenttypesController::class);


Route::resource('ecitems', App\Http\Controllers\EcitemsController::class);


Route::resource('quantities', App\Http\Controllers\QuantityController::class);


Route::resource('heatingtypes', App\Http\Controllers\HeatingtypesController::class);
