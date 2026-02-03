<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\CustomersController;
use App\Http\Controllers\PartsController;
use App\Http\Controllers\CarModelsController;
use App\Http\Controllers\CarsController;
use App\Http\Controllers\EmployeeTypesController;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\JobsController;
use App\Http\Controllers\JobRequestsController;
use App\Http\Controllers\GstController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\UiController;
use App\Http\Controllers\GatePassController;

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

/* Dashboard Route */

Route::get('/', function () {
    return view('welcome');
});

    //Route::get('/dashboard', [AdminDashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('admindashboard-index');

    Route::get('/dashboard', [AdminDashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('admindashboard-index');

Route::get('/ui-index', [UiController::class, 'index'])
    ->middleware('auth')
    ->name('ui-index');

    
    Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile-edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
});

Route::post('/logout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect()->route('login'); // Redirect to login page after logout
})->name('logout');


require __DIR__.'/auth.php';


/* User Route */
Route::get('/users-index',[UsersController::class,'index'])->name('users-index');
Route::get('/users-create',[UsersController::class,'create'])->name('users-create');
Route::post('/users-store',[UsersController::class,'store'])->name('users-store');
Route::get('/users-edit/{id}',[UsersController::class,'edit'])->name('users-edit');
Route::post('/users-update',[UsersController::class,'update'])->name('users-update');
Route::get('/users-delete/{id}',[UsersController::class,'delete'])->name('users-delete');

/* Customers Route */
Route::get('/customers-index',[CustomersController::class,'index'])->name('customers-index');
Route::get('/customers-create',[CustomersController::class,'create'])->name('customers-create');
Route::post('/customers-create',[CustomersController::class,'store'])->name('customers-store');
Route::get('/customers-edit/{id}',[CustomersController::class,'edit'])->name('customers-edit');
Route::post('/customers-update',[CustomersController::class,'update'])->name('customers-update');
Route::get('/customers-delete/{id}',[CustomersController::class,'delete'])->name('customers-delete');
//Route::post('/customers/store-from-job', [CustomersController::class, 'storeFromJob'])->name('customers.store-from-job');

/* Parts Route */
Route::get('/parts-index',[PartsController::class,'index'])->name('parts-index');
Route::get('/parts-create',[PartsController::class,'create'])->name('parts-create');
Route::post('/parts-create',[PartsController::class,'store'])->name('parts-store');
Route::get('/parts-edit/{id}',[PartsController::class,'edit'])->name('parts-edit');
Route::post('/parts-update',[PartsController::class,'update'])->name('parts-update');
Route::get('/parts-delete/{id}',[PartsController::class,'delete'])->name('parts-delete');
Route::post('/parts/import', [PartsController::class, 'import'])->name('parts.import');

/* CarModels Route */
Route::get('/carmodels-index',[CarModelsController::class,'index'])->name('carmodels-index');
Route::get('/carmodels-create',[CarModelsController::class,'create'])->name('carmodels-create');
Route::post('/carmodels-create',[CarModelsController::class,'store'])->name('cars-store');
Route::get('/carmodels-edit/{id}',[CarModelsController::class,'edit'])->name('carmodels-edit');
Route::post('/carmodels-update',[CarModelsController::class,'update'])->name('carmodels-update');
Route::get('/carmodels-delete/{id}',[CarModelsController::class,'delete'])->name('carmodels-delete');

/* Cars Route */
Route::get('/cars-index',[CarsController::class,'index'])->name('cars-index');
Route::get('/cars-create',[CarsController::class,'create'])->name('cars-create');
Route::post('/cars-create',[CarsController::class,'store'])->name('cars-store');
Route::get('/cars-edit/{id}',[CarsController::class,'edit'])->name('cars-edit');
Route::post('/cars-update',[CarsController::class,'update'])->name('cars-update');
Route::get('/cars-delete/{id}',[CarsController::class,'delete'])->name('cars-delete');

/* EmployeeTypes Route */
Route::get('/employeetypes-index',[EmployeeTypesController::class,'index'])->name('employeetypes-index');
Route::get('/employeetypes-create',[EmployeeTypesController::class,'create'])->name('employeetypes-create');
Route::post('/employeetypes-create',[EmployeeTypesController::class,'store'])->name('employeetypes-store');
Route::get('/employeetypes-edit/{id}',[EmployeeTypesController::class,'edit'])->name('employeetypes-edit');
Route::post('/employeetypes-update',[EmployeeTypesController::class,'update'])->name('employeetypes-update');
Route::get('/employeetypes-delete/{id}',[EmployeeTypesController::class,'delete'])->name('employeetypes-delete');

/* Employees Route */
Route::get('/employees-index',[EmployeesController::class,'index'])->name('employees-index');
Route::get('/employees-create',[EmployeesController::class,'create'])->name('employees-create');
Route::post('/employees-create',[EmployeesController::class,'store'])->name('employees-store');
Route::get('/employees-edit/{id}',[EmployeesController::class,'edit'])->name('employees-edit');
Route::post('/employees-update',[EmployeesController::class,'update'])->name('employees-update');
Route::get('/employees-delete/{id}',[EmployeesController::class,'delete'])->name('employees-delete');


/* Jobs Route */
Route::get('/jobs-index',[JobsController::class,'index'])->name('jobs-index');
Route::get('/jobs-create',[JobsController::class,'create'])->name('jobs-create');
Route::post('/jobs-store',[JobsController::class,'store'])->name('jobs-store');
Route::get('/jobs-edit/{id}',[JobsController::class,'edit'])->name('jobs-edit');
Route::post('/jobs-update',[JobsController::class,'update'])->name('jobs-update');
Route::get('/jobs-delete/{id}',[JobsController::class,'delete'])->name('jobs-delete');
Route::get('/fetch-parts', [PartsController::class, 'fetchParts'])->name('fetch-parts');
//Route::get('/job/fetch-customer/{id}', [JobsController::class, 'fetchCustomer']);
Route::get('/job/fetch-customer/{id}', [JobsController::class, 'fetchCustomer']);
Route::get('/job/fetch-customer-by-vin', [JobsController::class, 'fetchCustomerByVin']);
Route::get('/fetch-latest-job/{customer_id}', [JobsController::class, 'getLatestJob'])->name('fetch-latest-job');



/* Job Requests Route */

Route::get('/jobrequests-create',[JobRequestsController::class,'create'])->name('jobrequests-create');
Route::post('/jobrequests-store',[JobRequestsController::class,'store'])->name('jobrequests-store');

/* Gst Route */
Route::get('/gst-index',[GstController::class,'index'])->name('gst-index');
Route::get('/gst-create',[GstController::class,'create'])->name('gst-create');
Route::post('/gst-create',[GstController::class,'store'])->name('gst-store');
Route::get('/gst-edit/{id}',[GstController::class,'edit'])->name('gst-edit');
Route::post('/gst-update',[GstController::class,'update'])->name('gst-update');
Route::get('/gst-delete/{id}',[GstController::class,'delete'])->name('gst-delete');

/* Invoice Route */
Route::get('/invoice/{jobs}', [InvoiceController::class, 'generateInvoice'])->name('invoice.generate');
Route::get('/invoices-index',[UiController::class,'index'])->name('invoices-index');

/* Ui Route */
Route::get('/ui-index',[UiController::class,'index'])->name('ui-index');
Route::get('/ui-show',[UiController::class,'show'])->name('ui-show');

/* Gatepass Route */
Route::get('/gate-pass/pdf/{jobs}', [GatePassController::class, 'downloadPDF'])->name('gate-pass.pdf');

