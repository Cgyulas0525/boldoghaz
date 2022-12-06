<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContractcontentController;
use App\Http\Controllers\ContractnoncontentController;
use App\Http\Controllers\ContractcustomerprovideController;
use App\Http\Controllers\ContractannexController;
use App\Http\Controllers\ContractdeadlineController;
use App\Http\Controllers\ContractdeadlineitemController;

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

Route::get('contractAnnexIndex/{id}', [ContractannexController::class, 'contractAnnexIndex'])->name('contractAnnexIndex');
Route::get('contractAnnexCreate/{id}', [ContractannexController::class, 'contractAnnexCreate'])->name('contractAnnexCreate');
Route::get('contractAnnexView/{id}', [ContractannexController::class, 'contractAnnexView'])->name('contractAnnexView');

Route::get('contractDeadLineIndex/{id}', [ContractdeadlineController::class, 'contractDeadLineIndex'])->name('contractDeadLineIndex');
Route::get('contractDeadLineCreate/{id}', [ContractdeadlineController::class, 'contractDeadLineCreate'])->name('contractDeadLineCreate');

Route::get('contractdeadlineitemIndex/{id}', [ContractdeadlineitemController::class, 'contractdeadlineitemIndex'])->name('contractdeadlineitemIndex');
Route::get('contractDeadLineitemCreate/{id}', [ContractdeadlineitemController::class, 'contractDeadLineitemCreate'])->name('contractDeadLineitemCreate');

