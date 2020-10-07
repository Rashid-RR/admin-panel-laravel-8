<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CompanyMaster;
use Illuminate\Http\Request;

class CompanyMasterController extends Controller
{
    public function index(){

        $companies = CompanyMaster::all();

        if(count($companies) > 0){
            $company = CompanyMaster::find(1);
            return view('admin.company.index',compact('companies' , 'company'));
        }else{
            return view('admin.company.index',compact('companies'));
        }
    }
}
