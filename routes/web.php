<?php

use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin;
use App\Http\Controllers\CompanyFileController;
use App\Http\Controllers\CompanyInformationController;
use App\Http\Controllers\CompanyTypeController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DesignationController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\SalaryMethodController;
use App\Http\Controllers\ShiftController;
use App\Http\Controllers\Staff;

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

// Route::get('/users/{name?}',function($name=null){
//     return 'Hi ' . $name;
// })->where('name','[a-zA-Z]+');

// Route::get('/products/{id?}',function($id = null){
//     return 'Product id is = ' . $id;
// })->where('id','[0-9]+');

Auth::routes(['register' => false]);


Route::group(['as'=>'admin.','prefix'=>'admin','namespace'=>'Admin','middleware'=>['auth','admin']],function(){
    Route::get('dashboard',[Admin\DashboardController::class,'index'])->name('dashboard');
    Route::get('company-master',[Admin\CompanyMasterController::class,'index'])->name('company.view');
});

Route::group(['as' => 'staff.','prefix' => 'staff','namespace' => 'Staff','middleware' => ['auth','staff']],function(){
    Route::get('dashboard',[Staff\DashboardController::class,'index'])->name('dashboard');
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::view('/upload','sheet-upload/index');
Route::post('/import',[EmployeeController::class,'import'])->name('import-upload');

//This is for my tables CRUD
Route::resources([
    'department' => DepartmentController::class,
    'designation' => DesignationController::class,
    'companyFile' => CompanyFileController::class,
    'location' => LocationController::class,
    'shift' => ShiftController::class,
    'companyType' => CompanyTypeController::class,
    'salaryMethod' => SalaryMethodController::class,
    'companyInformation' => CompanyInformationController::class,
    'employee' => EmployeeController::class
]);
