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
        $companyInformations = CompanyInformation::all();
        $companyTypes = CompanyType::all();
        $salaryMethods = SalaryMethod::all();
        return view('admin.companyInformation.index',compact('companyInformations','companyTypes','salaryMethods'));
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
        //dd($request);
        $this->validate($request,[
            'companyType_id' => 'required',
            'companyTitle'=> 'required',
            'email'=> 'required',
            'employeeRange' => 'required',
            'salaryMethod_id' => 'required',
            'companyLogo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        $companyInfo = new CompanyInformation;
        $companyInfo->companyType_id = $request->companyType_id;
        $companyInfo->companyTitle = $request->companyTitle;
        $companyInfo->email = $request->email;
        $companyInfo->employeeRange = $request->employeeRange;
        $companyInfo->websiteAddress = $request->websiteAddress;
        $companyInfo->salaryMethod_id = $request->salaryMethod_id;

        if($request->file('companyLogo')){
            $file = $request->companyLogo;
            $imageName = time().'.'.$file->extension();
            $file->move(public_path('companyLogos'), $imageName);
            $companyInfo->companyLogo = $imageName;
        }
        $companyInfo->save();
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
    public function edit($id)
    {
        return view('admin.companyInformation.index',['CompanyInformationById' , CompanyInformation::findOrFail($id)]);
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
    public function destroy($id)
    {
        CompanyInformation::findOrFail($id)->delete();
        return redirect()->back()->with('success' , 'CompanyInformation deleted successfully !');
    }
}
