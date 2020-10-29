<?php

use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\Admin\DepartmentController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DesignationController;
use App\Http\Controllers\Admin\ShiftController;

use App\Http\Controllers\CompanyFileController;
use App\Http\Controllers\CompanyInformationController;
use App\Http\Controllers\CompanyTypeController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\SalaryMethodController;
use App\Http\Controllers\Staff;
use App\Models\Employee;

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


Auth::routes(['register' => false]);


Route::group(['as'=>'admin.','prefix'=>'admin','middleware'=>['auth','admin']],function(){
    Route::get('dashboard',[DashboardController::class,'index'])->name('dashboard');

    // Route::get('employees',[Admin\EmployeeController::class, 'index'])->name('employee.index');
    // Route::get('employee/add',[Admin\EmployeeController::class, 'create'])->name('employee.add');
    // Route::get('employee/edit/{id}',[Admin\EmployeeController::class, 'edit'])->name('employee.edit');
    // Route::post('employee/add',[Admin\EmployeeController::class,'store'])->name('employee.store');

    //Route::post('employee/edit',[Admin\EmployeeController::class,'update'])->name('employee.update');
    // Route::get('employee/detail',[Admin\EmployeeController::class, 'show'])->name('employee.detail');

    Route::resource('employee',EmployeeController::class);
    Route::resource('department',DepartmentController::class);
    Route::resource('shift',ShiftController::class);
    Route::resource('designation',DesignationController::class);

    // Route::resources([
    //     'department' => DepartmentController::class,
    //     'designation' => DesignationController::class,
    //     'companyFile' => CompanyFileController::class,
    //     'location' => LocationController::class,
    //     'shift' => ShiftController::class,
    //     'companyType' => CompanyTypeController::class,
    //     'salaryMethod' => SalaryMethodController::class,
    //     'companyInformation' => CompanyInformationController::class,
    //     'employee' => Admin\EmployeeController::class
    // ]);
    
});

Route::group(['as' => 'staff.','prefix' => 'staff','namespace' => 'Staff','middleware' => ['auth','staff']],function(){
    Route::get('dashboard',[Staff\DashboardController::class,'index'])->name('dashboard');
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::view('/upload','sheet-upload/index');
Route::post('/import',[EmployeeController::class,'importCSV'])->name('import-upload');
Route::get('/export',[EmployeeController::class,'exportCSV'])->name('export');

//This is for my tables CRUD

