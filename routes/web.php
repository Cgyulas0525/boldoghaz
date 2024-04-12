<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\ConstructionphaseController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DestroysController;
use App\Http\Controllers\EcecitemsController;
use App\Http\Controllers\EmailsController;
use App\Http\Controllers\EqeqitemsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PartnerbankaccountsController;
use App\Http\Controllers\PartnerdatasheetController;
use App\Http\Controllers\PartnersController;
use App\Http\Controllers\PartnerspartnertypesController;
use App\Http\Controllers\PartnertypeChildController;
use App\Http\Controllers\PhonenumbersController;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get('/home', [
    HomeController::class, 'index'
])->name('home');

Route::get('index', [DashboardController::class, 'index'])->name('dashboard');
Route::get('underconstruction', [DashboardController::class, 'underconstruction'])->name('underConstruction');
Route::resource('userstatuses', \App\Http\Controllers\Dictionaries\UserstatusController::class);
Route::resource('addresstypes', \App\Http\Controllers\Dictionaries\AddresstypesController::class);
Route::resource('partnertypes', \App\Http\Controllers\Dictionaries\PartnertypesController::class);
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
Route::get('createChild/{id}', [PartnertypeChildController::class, 'createChild'])->name('ptChildCreate');
Route::post('store', [PartnertypeChildController::class, 'store'])->name('ptChildStore');

Route::resource('settlements', App\Http\Controllers\SettlementsController::class);
Route::resource('partners', App\Http\Controllers\PartnersController::class);
Route::resource('addresses', App\Http\Controllers\AddressController::class);
Route::resource('emails', App\Http\Controllers\EmailsController::class);
Route::resource('phonenumbers', App\Http\Controllers\PhonenumbersController::class);
Route::resource('partnerspartnertypes', App\Http\Controllers\PartnerspartnertypesController::class);

Route::get('partnerPartnerTypesIndex/{id}', [PartnerdatasheetController::class, 'partnerPartnerTypesIndex'])->name('partnerPartnerTypesIndex');
Route::get('partnerAddressIndex/{id}', [PartnerdatasheetController::class, 'partnerAddressIndex'])->name('partnerAddressIndex');
Route::get('partnerPhonenumbersIndex/{id}', [PartnerdatasheetController::class, 'partnerPhonenumbersIndex'])->name('partnerPhonenumbersIndex');
Route::get('partnerEmailsIndex/{id}', [PartnerdatasheetController::class, 'partnerEmailsIndex'])->name('partnerEmailsIndex');
Route::get('partnerBAIndex/{id}', [PartnerdatasheetController::class, 'partnerBAIndex'])->name('partnerBAIndex');

Route::get('partnerPartnerTypesDestroy/{id}', [PartnerdatasheetController::class, 'partnerPartnerTypesDestroy'])->name('partnerPartnerTypesDestroy');
Route::get('addressDestroy/{id}', [PartnerdatasheetController::class, 'addressDestroy'])->name('addressDestroy');
Route::get('phonenumberDestroy/{id}', [PartnerdatasheetController::class, 'phonenumberDestroy'])->name('phonenumberDestroy');
Route::get('peDestroy/{id}', [PartnerdatasheetController::class, 'peDestroy'])->name('peDestroy');
Route::get('pbaDestroy/{id}', [PartnerdatasheetController::class, 'pbaDestroy'])->name('pbaDestroy');

Route::get('changePartnerLive/{id}', [PartnersController::class, 'changePartnerLive'])->name('changePartnerLive');
Route::get('paCreate/{id}', [AddressController::class, 'paCreate'])->name('paCreate');
Route::get('pphoneCreate/{id}', [PhonenumbersController::class, 'pphoneCreate'])->name('pphoneCreate');
Route::get('peCreate/{id}', [EmailsController::class, 'peCreate'])->name('peCreate');
Route::get('create/{id}', [PartnerspartnertypesController::class, 'create'])->name('pptCreate');
Route::get('pbaCreate/{id}', [PartnerbankaccountsController::class, 'pbaCreate'])->name('pbaCreate');

Route::resource('financialinstitutions', App\Http\Controllers\FinancialinstitutionsController::class);
Route::resource('partnerbankaccounts', App\Http\Controllers\PartnerbankaccountsController::class);
Route::resource('contracttypes', App\Http\Controllers\ContracttypesController::class);
Route::resource('housetypes', App\Http\Controllers\HousetypesController::class);

Route::get('destroy/{table}/{id}/{route}', [DestroysController::class, 'destroy'])->name('destroys');
Route::get('destroyWithParam/{table}/{id}/{route}/{param}', [DestroysController::class, 'destroyWithParam'])->name('destroyWithParam');

Route::get('beforeDestroys/{table}/{id}/{route}', [DestroysController::class, 'beforeDestroys'])->name('beforeDestroys');
Route::get('beforeDestroysWithParam/{table}/{id}/{route}/{param}', [DestroysController::class, 'beforeDestroysWithParam'])->name('beforeDestroysWithParam');

Route::resource('retentiontypes', App\Http\Controllers\RetentiontypesController::class);
Route::resource('annextypes', \App\Http\Controllers\Dictionaries\AnnextypesController::class);
Route::resource('vismaiortypes', App\Http\Controllers\VismaiortypesController::class);
Route::resource('contracts', App\Http\Controllers\ContractController::class);
Route::resource('menus', App\Http\Controllers\MenuController::class);
Route::resource('contractcontenttypes', \App\Http\Controllers\ProjectDictionaries\ContractcontenttypesController::class);
Route::resource('contractnoncontenttypes', \App\Http\Controllers\ProjectDictionaries\ContractnoncontenttypesController::class);
Route::resource('contractcustomerprovidetypes', App\Http\Controllers\ContractcustomerprovidetypesController::class);

Route::resource('penaltytypes', App\Http\Controllers\PenaltytypesController::class);

Route::resource('constructionphases', App\Http\Controllers\ConstructionphaseController::class);

Route::get('ptindex/{id}', [PartnertypeChildController::class, 'ptindex'])->name('ptChildIndex');
Route::get('ptcreateChild/{id}', [PartnertypeChildController::class, 'ptcreateChild'])->name('ptChildCreate');
Route::post('ptstore', [PartnertypeChildController::class, 'ptstore'])->name('ptChildStore');

Route::get('childIndex/{id}', [ConstructionphaseController::class, 'childIndex'])->name('cpChildIndex');
Route::get('createChild/{id}', [ConstructionphaseController::class, 'createChild'])->name('cpChildCreate');
Route::post('childStore', [ConstructionphaseController::class, 'childStore'])->name('cpChildStore');

Route::resource('contractcontents', App\Http\Controllers\ContractcontentController::class);

Route::resource('contractnoncontents', App\Http\Controllers\ContractnoncontentController::class);

Route::resource('contractcustomerprovides', App\Http\Controllers\ContractcustomerprovideController::class);

Route::resource('contractannexes', App\Http\Controllers\ContractannexController::class);

Route::resource('contractdeadlines', App\Http\Controllers\ContractdeadlineController::class);


Route::resource('contractdeadlineitems', App\Http\Controllers\ContractdeadlineitemController::class);


Route::resource('contractpayments', App\Http\Controllers\ContractpaymentController::class);


Route::resource('contractvismaiors', App\Http\Controllers\ContractvismaiorController::class);


Route::resource('contractretentions', App\Http\Controllers\ContractretentionController::class);


Route::resource('contractpenalties', App\Http\Controllers\ContractpenaltyController::class);


Route::resource('contractcontracts', App\Http\Controllers\ContractcontractController::class);
