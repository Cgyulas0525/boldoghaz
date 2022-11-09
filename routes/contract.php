<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContractcontentController;
use App\Http\Controllers\ContractnoncontentController;

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
Route::get('contractcontentIndex/{id}', [ContractcontentController::class, 'contractcontentIndex'])->name('contractcontentIndex');
Route::get('contractContentAllButton/{id}', [ContractcontentController::class, 'contractContentAllButton'])->name('contractContentAllButton');
Route::get('contractContentCreate/{id}', [ContractcontentController::class, 'contractContentCreate'])->name('contractContentCreate');

Route::get('contractnoncontentIndex/{id}', [ContractnoncontentController::class, 'contractnoncontentIndex'])->name('contractnoncontentIndex');
Route::get('contractContentAllButton/{id}', [ContractnoncontentController::class, 'contractContentAllButton'])->name('contractNonContentAllButton');
Route::get('contractNonContentCreate/{id}', [ContractcontentController::class, 'contractNonContentCreate'])->name('contractNonContentCreate');


