<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CompanyInformation;
use App\Models\CompanyType;
use App\Models\SalaryMethod;
use Illuminate\Http\Request;

class CompanyInformationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companyInfo = CompanyInformation::all();
        $companyType = CompanyType::all();
        $salaryMethod = SalaryMethod::all();
        return view('admin.companyInformation.index',compact('companyInfo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companyType = CompanyType::all();
        $salaryMethod = SalaryMethod::all();
        return view('companyInformation.create',['companyType' => $companyType , 'salaryMethod' => $salaryMethod]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required'
        ]);
        CompanyInformation::created($request->all());
        return redirect()->back()->with('success' , 'CompanyInformation Created Successfully !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CompanyInformation  $CompanyInformation
     * @return \Illuminate\Http\Response
     */
    public function show(CompanyInformation $CompanyInformation)
    {
        return view('companyInformation.show',['CompanyInformation',$CompanyInformation]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CompanyInformation  $CompanyInformation
     * @return \Illuminate\Http\Response
     */
    public function edit(CompanyInformation $CompanyInformation)
    {
        return view('companyInformation.edit',['CompanyInformation' , CompanyInformation::findOrFail($CompanyInformation->id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CompanyInformation  $CompanyInformation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CompanyInformation $CompanyInformation)
    {
        $this->validate($request,[
            'name' => 'required'
        ]);
        CompanyInformation::findOrFail($CompanyInformation->id)->update($request->all());
        return redirect()->back()->with('success' , 'CompanyInformation Updated successfully !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CompanyInformation  $CompanyInformation
     * @return \Illuminate\Http\Response
     */
    public function destroy(CompanyInformation $CompanyInformation)
    {
        CompanyInformation::findOrFail($CompanyInformation->id)->delete();
        return redirect()->back()->with('success' , 'CompanyInformation deleted successfully !');
    }
}
