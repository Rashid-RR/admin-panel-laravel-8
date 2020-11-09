<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CompanyType;
use Illuminate\Http\Request;

class CompanyTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companytypes=CompanyType::all();
        return view('admin.companytype.index',compact('companytypes'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('companyType.create');
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
        CompanyType::created($request->all());
        return redirect()->back()->with('success' , 'CompanyType Created Successfully !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CompanyType  $CompanyType
     * @return \Illuminate\Http\Response
     */
    public function show(CompanyType $CompanyType)
    {
        return view('companyType.show',['CompanyType',$CompanyType]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CompanyType  $CompanyType
     * @return \Illuminate\Http\Response
     */
    public function edit(CompanyType $CompanyType)
    {
        return view('companyType.edit',['CompanyType' , CompanyType::findOrFail($CompanyType->id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CompanyType  $CompanyType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CompanyType $CompanyType)
    {
        $this->validate($request,[
            'name' => 'required'
        ]);
        CompanyType::findOrFail($CompanyType->id)->update($request->all());
        return redirect()->back()->with('success' , 'CompanyType Updated successfully !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CompanyType  $CompanyType
     * @return \Illuminate\Http\Response
     */
    public function destroy(CompanyType $CompanyType)
    {
        CompanyType::findOrFail($CompanyType->id)->delete();
        return redirect()->back()->with('success' , 'CompanyType deleted successfully !');
    }
}
