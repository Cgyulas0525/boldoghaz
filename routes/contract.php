<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContractcontentController;
use App\Http\Controllers\ContractnoncontentController;
use App\Http\Controllers\ContractcustomerprovideController;

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
Route::get('contractnoncontentIndex/{id}', [ContractnoncontentController::class, 'contractnoncontentIndex'])->name('contractnoncontentIndex');
Route::get('contractNonContentCreate/{id}', [ContractcontentController::class, 'contractNonContentCreate'])->name('contractNonContentCreate');

Route::get('contractcontentIndex/{id}', [ContractcontentController::class, 'contractcontentIndex'])->name('contractcontentIndex');
Route::get('contractContentAllButton/{id}/{model}', [ContractcontentController::class, 'contractContentAllButton'])->name('contractContentAllButton');
Route::get('contractContentCreate/{id}', [ContractcontentController::class, 'contractContentCreate'])->name('contractContentCreate');

Route::get('contractcustomerprovideIndex/{id}', [ContractcustomerprovideController::class, 'contractcustomerprovideIndex'])->name('contractcustomerprovideIndex');
Route::get('contractCustomerProvideCreate/{id}', [ContractcustomerprovideController::class, 'contractCustomerProvideCreate'])->name('contractCustomerProvideCreate');


