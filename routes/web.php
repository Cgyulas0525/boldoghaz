<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EcecitemsController;
use App\Http\Controllers\EqeqitemsController;
use App\Http\Controllers\PartnertypeChildController;

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
Route::resource('ececitems', App\Http\Controllers\EcecitemsController::class);
Route::get('indexEC/{id}', [EcecitemsController::class, 'indexEC'])->name('indexEC');
Route::get('createEC/{id}', [EcecitemsController::class, 'createEC'])->name('createEC');
Route::resource('structures', App\Http\Controllers\StructuresController::class);
Route::resource('eqitems', App\Http\Controllers\EqitemsController::class);
Route::resource('eqeqitems', App\Http\Controllers\EqeqitemsController::class);
Route::get('indexEQ/{id}', [EqeqitemsController::class, 'indexEQ'])->name('indexEQ');
Route::resource('additionalelements', App\Http\Controllers\AdditionalelementsController::class);
Route::get('index/{id}', [PartnertypeChildController::class, 'index'])->name('ptChildIndex');
Route::get('create/{id}', [PartnertypeChildController::class, 'create'])->name('ptChildCreate');
Route::post('store', [PartnertypeChildController::class, 'store'])->name('ptChildStore');


Route::resource('settlements', App\Http\Controllers\SettlementsController::class);
