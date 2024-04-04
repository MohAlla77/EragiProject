km<?php

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
use App\Http\Controllers\CategorizeController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ManagemetController;
use App\Http\Controllers\PurchasesController;
use App\Http\Controllers\ServiceGroupController;
use App\Http\Controllers\SpearController;
use App\Http\Controllers\TiresController;
use App\Models\Car;
use App\Models\Service;

Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'store']);
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'authenticate']);
});

Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

Route::get('/', [HomeController::class, 'index'])->name('home')->middleware('auth');

 Route::get('/workspace', function() {
    return view('WorkSpace');
})->name('Workspace')->middleware('auth');


Route::get('/invoice', [InvoiceController::class , 'index'])->name('invoice.index');

Route::get('/invoice/Sales_accept',  function () {
    return view('Sales_accept',['Services' => Service::all()]);
})->name('Sales_accept');



Route::get('/tries', [TiresController::class , 'index'])->name('Tries');
Route::post('/tries', [TiresController::class , 'AddTire'])->name('Tries.Add');




Route::get('/store', function () {
    return view('store');
})->name('store');


Route::get('/Management', function () {
    return view('Manage');
})->name('Manage');


Route::prefix('/management')->group(function () {
    Route::get('/DataEntry', function () {
        return view('Management_page.Data_Entry');
    })->name('Data_Entry');



    Route::get('/customer', function () {
        return view('Management_page.Customers');
    })->name('Customers');

    Route::get('/Employee', function () {
        return view('Management_page.employees');
    })->name('employees');

    Route::get('/', function () {
        return view('Management_page.Employee_requests');
    })->name('Employee_requests');

    Route::get('/Report', function () {
        return view('Management_page.Reports');
    })->name('Reports');

    Route::get('/User_management', function () {
        return view('Management_page.User_management');
    })->name('User_management');
});



Route::get('/invoice', [InvoiceController::class , 'index'])->name('invoice.index');

Route::get('/seals', [PurchasesController::class , 'SealsIndex'])->name('seals');
Route::put('/seals/{id}/update', [PurchasesController::class , 'Approve'])->name('ApproveService');

Route::get('/purchases', [PurchasesController::class , 'index'])->name('purchases');
Route::post('/purchases' , [ServiceGroupController::class , 'store'])->name('ServiceGroup.store');
Route::post('/purchases/categorize_group' , [CategorizeController::class , 'StoreGroup'])->name('CategorizeGroup.store');
Route::post('/purchases/categorize' , [CategorizeController::class , 'store'])->name('Categorize.store');



Route::post('/purchases/services' , [PurchasesController::class , 'ServiceStore'])->name('Service.store');
Route::post('/purchases/supplier' , [PurchasesController::class , 'SupplierStore'])->name('Supplier.store');
Route::put('purchases/update/{id}', [PurchasesController::class , 'UpdateService'])->name('service.update');
Route::delete('purchases/delete/{id}', [PurchasesController::class , 'DeleteService'])->name('service.delete');





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

Route::post('/management/DataEntry/AddCompany', [ManagemetController::class , 'CompanyStore'])->name('Data_Entry.Company');


