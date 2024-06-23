<?php

use App\Http\Controllers\{
    AuthController,
    CarController,
    CategorizeController,
    Data_EntryController,
    EmployeesController,
    HomeController,
    InvoiceController,
    ManagemetController,
    NavbarController,
    PricingController,
    ProfileController,
    PurchasesController,
    ReportsController,
    ServiceController,
    ServiceGroupController,
    SpearController,
    StoreController,
    SupplierController,
    TiresController,
};
use App\Models\{Car, employees, Service, Supplier};
use Doctrine\DBAL\Schema\Index;
use Illuminate\Support\Facades\Date;
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

// Guest routes


Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'store']);
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'authenticate']);
    Route::get('/login/forgetpassword', function() {
        return view('auth.password');
    })->name('forgetPass');
});

Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

// Authenticated routes
Route::group(['middleware' => 'auth'], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/workspace', function () {
        return view('WorkSpace');
    })->name('Workspace');
    Route::get('/car', [CarController::class, 'index'])->name('new.car');
    Route::post('/car/add', [CarController::class, 'store'])->name('car.store');
    Route::post('/workspace/{id}/AddCheck', [CarController::class, 'Add'])->name('AddCar.check');
    Route::post('/workspace/{id}/AddMaintenance', [CarController::class, 'AddMaintenance'])->name('Add.Maintenance');
    Route::post('/workspace/{id}/AddDone', [CarController::class, 'AddDone'])->name('Add.Done');
    Route::get('/check', [HomeController::class, 'CheckPage'])->name('page.check');
    Route::post('/check/{id}/Removecheck/{user}', [CarController::class, 'Remove'])->name('RemoveCar.check');
});

// Invoice routes
Route::group(['prefix' => 'invoice'], function () {
    Route::get('/', [InvoiceController::class, 'index'])->name('invoice.index');
    Route::get('/Sales_accept', function () {
        return view('Sales_accept', ['Services' => Service::all()]);
    })->name('Sales_accept');
    Route::get('/spear', [SpearController::class, 'search'])->name('spare.search');
    Route::get('/Plate', [CarController::class, 'CarPlateSearch'])->name('carPlate.search');
    Route::get('/print', [InvoiceController::class, 'GeneratePdf'])->name('invoice.print');
    Route::post('/{id}/add_spear', [SpearController::class, 'StoreSpear'])->name('spear.store');
    Route::post('/{id}/add_service', [SpearController::class, 'StoreService'])->name('service.store');
    Route::post('/{invoice}/order_quotation', [InvoiceController::class, 'order_quotation'])->name('invoice.order_quotation');
});

// Tires routes
Route::group(['prefix' => 'tries'], function () {
    Route::get('/', [TiresController::class, 'index'])->name('Tries');
    Route::post('/', [TiresController::class, 'AddTire'])->name('Tries.Add');
    Route::get('/Tires', [NavbarController::class, 'Tires']);
});

// Supplier routes
Route::group(['prefix' => 'Supplier'], function () {
    Route::get('/', [SupplierController::class, 'index'])->name('Supplier');
    Route::post('/', [SupplierController::class, 'SupplierStore'])->name('Supplier.Add');
});

// Categorize routes
Route::group(['prefix' => 'Categorize'], function () {
    Route::get('/', [CategorizeController::class, 'index'])->name('Categorize');
    Route::post('/', [CategorizeController::class, 'store'])->name('Categorize.store');    
});

//Store routes
Route::group(['prefix' => 'Store'], function (){
    Route::get('/', [StoreController::class, 'index'])->name('Store');
    Route::get('/Store', [NavbarController::class, 'Store']);
});

// Employees routes
Route::group(['prefix' => 'Employees'], function () {
    Route::get('/', [EmployeesController::class, 'index'])->name('Employees');
    Route::post('/', [EmployeesController::class, 'Employeesstore'])->name('Employees.Add');
    // Route::get('/'[EmployeesContoller::class, 'show'])->name('employees.show');
    Route::get('/search', [EmployeesController::class, 'search'])->name('employees.search');
    Route::get('/Employees', [NavbarController::class, 'index']);
});

// Pricing routes
Route::group(['prefix' => 'Pricing'], function () {
    Route::get('/', [PricingController::class, 'index'])->name('Pricing.index');
    Route::post('/', [PricingController::class, 'store'])->name('Pricing.store');
});

// Service routes
Route::group(['prefix' => 'Service'], function () {
    Route::get('/', [ServiceController::class, 'index'])->name('Service.index');
    Route::post('/', [ServiceController::class, 'ServiceStore'])->name('Service.store');
});

// Reports Route
Route::group(['prefix' => 'Reports'], function(){
    Route::get('/', [ReportsController::class, 'index'])->name('Reports');
});

// Data_Entry Route
Route::group(['prefix' => 'Data_Entry'], function(){
    Route::get('/', [Data_EntryController::class, 'index'])->name('Data_Entry');
    Route::post('/', [Data_EntryController::class, 'CompanyStore'])->name('Data_Entry.CompanyStore');
});

// Profile Route
Route::group(['prefix' => 'Profile'], function(){
    Route::get('/', [ProfileController::class, 'index'])->name('profile');
    // Route::post('/', [Controller::class, ''])->name('');
});

// Home route
Route::get('/', [HomeController::class, 'index'])->name('home')->middleware('auth');

Route::get('/workspace', function () {
    return view('WorkSpace');
})->name('Workspace')->middleware('auth');


Route::get('/invoice', [InvoiceController::class, 'index'])->name('invoice.index');

Route::get('/invoice/Sales_accept', function () {
    return view('Sales_accept', ['Services' => Service::all()]);
})->name('Sales_accept');



Route::get('/test', function () {
    return view('pdf.Job_order');
});


// Management routes
Route::group(['prefix' => 'management'], function () {

    Route::get('/customer', function () {
        return view('Management_page.Customers');
    })->name('Customers');

    Route::get('/User_management', function () {
        return view('Management_page.User_management');
    })->name('User_management');
});

// Purchases routes
Route::group(['prefix' => 'purchases'], function () {
    Route::get('/', [PurchasesController::class, 'index'])->name('purchases');
    Route::post('/', [ServiceGroupController::class, 'store'])->name('ServiceGroup.store');
    Route::post('/categorize_group', [CategorizeController::class, 'StoreGroup'])->name('CategorizeGroup.store');
    Route::post('/categorize', [CategorizeController::class, 'store'])->name('Categorize.store');
    Route::post('/services', [PurchasesController::class, 'ServiceStore'])->name('Service.store');
    Route::post('/supplier', [PurchasesController::class, 'SupplierStore'])->name('Supplier.store');
    Route::put('update/{id}', [PurchasesController::class, 'UpdateService'])->name('service.update');
    Route::delete('delete/{id}', [PurchasesController::class, 'DeleteService'])->name('service.delete');
    Route::post('/{purchases}/order_sales', [PurchasesController::class, 'order_sales'])->name('Purchases.order_sales');
    Route::get('/purchases', [NavbarController::class, 'index']);
});

// Seals routes
Route::group(['prefix' => 'seals'], function () {
    Route::get('/', [PurchasesController::class, 'SealsIndex'])->name('seals');
    Route::put('/{id}/update', [PurchasesController::class, 'Approve'])->name('ApproveService');
});

// Search route
Route::get('/search', [CarController::class, 'search'])->name('car.search');

// Generic routes
Route::group(['prefix' => '{type}'], function () {
    Route::get('/', [HomeController::class, 'view'])->name('page.view');
    Route::post('/{car}/done', [HomeController::class, 'ToDone'])->name('car.ToDone');
    Route::post('/{car}/wait', [HomeController::class, 'ToWait'])->name('car.ToWait');
});


