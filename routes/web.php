<?php

use App\Http\Controllers\CarController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

use App\Http\Controllers\AuthController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\PurchasesController;
use App\Http\Controllers\ServiceGroupController;
use App\Http\Controllers\SpearController;
use App\Models\Car;

Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'store']);
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'authenticate']);
});

Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

Route::get('/', function () {
    return view('home');
})->name('home')->middleware('auth');

 Route::get('/workspace', function() {
    return view('WorkSpace');
})->name('Workspace')->middleware('auth');


Route::get('/manage', function () {
    return view('Management');
})->name('manage');


Route::get('/layout', function () {
    return view('test');
})->middleware('auth');



Route::get('/invoice', [InvoiceController::class , 'index'])->name('invoice.index');



Route::get('/seals', [PurchasesController::class , 'SealsIndex'])->name('seals');
Route::put('/seals/{id}/update', [PurchasesController::class , 'Approve'])->name('ApproveService');

Route::get('/purchases', [PurchasesController::class , 'index'])->name('purchases');
Route::post('/purchases' , [ServiceGroupController::class , 'store'])->name('ServiceGroup.store');
Route::post('/purchases/services' , [PurchasesController::class , 'ServiceStore'])->name('Service.store');



Route::get('/invoice/spear', [SpearController::class, 'search'])->name('spare.search');
Route::get('/invoice/Plate' , [CarController::class , 'CarPlateSearch'])->name('carPlate.search');
Route::get('/invoice/print' , [InvoiceController::class , 'GeneratePdf'])->name('invoice.print');
Route::post('/invoice/{id}/add_spear' , [SpearController::class , 'StoreSpear'])->name('spear.store');
Route::post('/invoice/{id}/add_service' , [SpearController::class , 'StoreService'])->name('service.store');


Route::get('/car', [CarController::class , 'index'] )->name('new.car')->middleware('auth');
Route::post('/car', [CarController::class , 'store'] )->name('car.store');


Route::post('/workspace/{id}/AddCheck' , [CarController::class , 'Add'])->name('AddCar.check');
Route::post('/workspace/{id}/AddMaintenance' , [CarController::class , 'AddMaintenance'])->name('Add.Maintenance');
Route::post('/workspace/{id}/AddDone' , [CarController::class , 'AddDone'])->name('Add.Done');

Route::get('/search' , [CarController::class , 'search'])->name('car.search');

Route::get('/check', [HomeController::class , 'CheckPage'] )->name('page.check');
Route::post('/check/{id}/Removecheck/{user}', [CarController::class , 'Remove'] )->name('RemoveCar.check');


Route::get('/{type}', [HomeController::class , 'view'] )->name('page.view');
Route::post('/{car}/done', [HomeController::class , 'ToDone'] )->name('car.ToDone');


