<?php

use App\Http\Controllers\{
    AuthController,
    CarController,
    CategorizeController,
    EmployeesController,
    HomeController,
    InvoiceController,
    ManagemetController,
    PricingController,
    PurchasesController,
    ReceivingPricingRequestsController,
    ServiceGroupController,
    SpearController,
    SupplierController,
    TiresController
};
use App\Models\{Car, Service, Supplier};
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
    Route::post('/car', [CarController::class, 'store'])->name('car.store');
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
});

// Supplier routes
Route::group(['prefix' => 'Supplier'], function () {
    Route::get('/', [SupplierController::class, 'index'])->name('Supplier');
    Route::post('/', [SupplierController::class, 'SupplierStore'])->name('Supplier.Add');
});

// Employees routes
Route::group(['prefix' => 'Employees'], function () {
    Route::get('/', [EmployeesController::class, 'index'])->name('Employees');
    Route::post('/', [EmployeesController::class, 'Employeesstore'])->name('Employees.Add');
});

// Receiving Pricing Requests routes
Route::group(['prefix' => 'receiving-pricing-requests'], function () {
    Route::get('/', [PricingController::class, 'index'])->name('ReceivingPricingRequests.index');
    Route::post('/', [PricingController::class, 'store'])->name('ReceivingPricingRequests.store');
});

// Store route
Route::get('/', [HomeController::class, 'index'])->name('home')->middleware('auth');

Route::get('/workspace', function () {
    return view('WorkSpace');
})->name('Workspace')->middleware('auth');


Route::get('/invoice', [InvoiceController::class, 'index'])->name('invoice.index');

Route::get('/invoice/Sales_accept', function () {
    return view('Sales_accept', ['Services' => Service::all()]);
})->name('Sales_accept');



Route::get('/Categorize', [CategorizeController::class, 'index'])->name('Categorize');
Route::post('/Categorize', [CategorizeController::class, 'store'])->name('Categorize.store');


Route::get('/tries', [TiresController::class, 'index'])->name('Tries');
Route::post('/tries', [TiresController::class, 'AddTire'])->name('Tries.Add');

Route::get('/Supplier', [SupplierController::class, 'index'])->name('Supplier');
Route::post('/Supplier', [SupplierController::class, 'SupplierStore'])->name('Supplier.Add');

Route::get('/Employees', [EmployeesController::class, 'index'])->name('Employees');
Route::post('/Employees', [EmployeesController::class, 'Employeesstore'])->name('Employees.Add');
// Route::get('/search', [EmployeesController::class, 'search'])->name('employees.search');

Route::get('/pricing', [PricingController::class, 'index'])->name('Pricing');
Route::post('/pricing', [PricingController::class, 'store'])->name('Pricing.store');

Route::get('/test', function () {
    return view('pdf.Job_order');
});


Route::get('/Store', function () {
    return view('Store');
})->name('Store');

Route::get('/Employee_requests', function () {
    return view('Employee_requests');
});

Route::get('/profile', function () {
    return view('profile');
})->name('profile');

Route::get('/store', function () {
    return view('store');
})->name('store');

// Management routes
Route::group(['prefix' => 'management'], function () {

    Route::get('/', function () {
        return view('Management_page.Data_Entry');
    })->name('Manage');
    Route::get('/DataEntry', function () {
        return view('Management_page.Data_Entry');
    })->name('Data_Entry');
    Route::get('/customer', function () {
        return view('Management_page.Customers');
    })->name('Customers');
    Route::post('/Employee', [EmployeesController::class, 'Employeesstore'])->name('emp.store');
    Route::get('/', function () {
        return view('Management_page.Employee_requests');
    })->name('Employee_requests');

    // Route::get('Employee', function () {

    //     $workplaces =[
    //         'يبنع الصناعية', 'حي الياقوت', 'المدينة المنورة'
    //     ];

    //     return view('employees',compact( "workplaces"));
    // })->name('employees');

    // Route::get('/', function () {
    //     return view('Management_page.Employee_requests');
    // })->name('Employee_requests');

    Route::get('/Report', function () {
        return view('Management_page.Reports');
    })->name('Reports');
    Route::get('/User_management', function () {
        return view('Management_page.User_management');
    })->name('User_management');
    Route::post('/DataEntry/AddCompany', [ManagemetController::class, 'CompanyStore'])->name('Data_Entry.Company');
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


