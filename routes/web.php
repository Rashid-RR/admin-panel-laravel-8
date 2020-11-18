<?php

use App\Http\Controllers\Admin\AttendanceController;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\Admin\DepartmentController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DesignationController;
use App\Http\Controllers\Admin\ShiftController;
use App\Http\Controllers\Admin\CompanyInformationController;
use App\Http\Controllers\Admin\CompanyTypeController;
use App\Http\Controllers\Admin\HolidayController;
use App\Http\Controllers\Admin\SalaryMethodController;


use App\Http\Controllers\Staff;
use App\Models\Employee;

Route::get('/', function () {
    return view('welcome');
});


Auth::routes(['register' => false]);

Route::get('import',[EmployeeController::class,'importCSV'])->name('import');

Route::group(['as'=>'admin.','prefix'=>'admin','middleware'=>['auth','admin']],function(){

    Route::get('dashboard',[DashboardController::class,'index'])->name('dashboard');
    Route::post('/employee/import',[EmployeeController::class,'importCSV'])->name('emp.import');

    Route::get('/employee/exportCSV',[EmployeeController::class,'exportCSV'])->name('emp.exportCSV');
    Route::get('/employee/exportEXCEL',[EmployeeController::class,'exportEXCEL'])->name('emp.exportEXCEL');
    Route::get('/employee/attendances',[AttendanceController::class,'attendances'])->name('emp.attendances');
    // Route::get('/employee/exportPDF',[EmployeeController::class,'exportPDF'])->name('emp.exportPDF');
    Route::post('/employee/'); 
    // Route::get('/create2',[EmployeeController::class,'create2'])->name('create2');
    // Route::post('/create2Store',[EmployeeController::class,'create2Store'])->name('create2Store');

    Route::resource('employee',EmployeeController::class);
    Route::resource('department',DepartmentController::class);
    Route::resource('shift',ShiftController::class);
    Route::resource('designation',DesignationController::class);
    Route::resource('companyInformation',CompanyInformationController::class);
    Route::resource('companyType',CompanyTypeController::class);
    Route::resource('salaryMethod',SalaryMethodController::class);
    Route::resource('attendance',AttendanceController::class);
    Route::resource('holiday',HolidayController::class);
});
Route::post('/employee/importCSV2',[EmployeeController::class,'importCSV2'])->name('emp.importCSV2');

////////-----------------------------------------------------------------------------------------------------------------

Route::group(['as' => 'staff.','prefix' => 'staff','namespace' => 'Staff','middleware' => ['auth','staff']],function(){
    Route::get('dashboard',[Staff\DashboardController::class,'index'])->name('dashboard');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');