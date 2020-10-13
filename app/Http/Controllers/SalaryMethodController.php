<?php

namespace App\Http\Controllers;

use App\Models\SalaryMethod;
use Illuminate\Http\Request;

class SalaryMethodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return SalaryMethod::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('salaryMethod.create');
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
            'methodName' => 'required'
        ]);
        SalaryMethod::created($request->all());
        return redirect()->back()->with('success' , 'SalaryMethod Created Successfully !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SalaryMethod  $SalaryMethod
     * @return \Illuminate\Http\Response
     */
    public function show(SalaryMethod $SalaryMethod)
    {
        return view('salaryMethod.show',['SalaryMethod',$SalaryMethod]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SalaryMethod  $SalaryMethod
     * @return \Illuminate\Http\Response
     */
    public function edit(SalaryMethod $SalaryMethod)
    {
        return view('salaryMethod.edit',['SalaryMethod' , SalaryMethod::findOrFail($SalaryMethod->id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SalaryMethod  $SalaryMethod
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SalaryMethod $SalaryMethod)
    {
        $this->validate($request,[
            'name' => 'required'
        ]);
        SalaryMethod::findOrFail($SalaryMethod->id)->update($request->all());
        return redirect()->back()->with('success' , 'SalaryMethod Updated successfully !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SalaryMethod  $SalaryMethod
     * @return \Illuminate\Http\Response
     */
    public function destroy(SalaryMethod $SalaryMethod)
    {
        SalaryMethod::findOrFail($SalaryMethod->id)->delete();
        return redirect()->back()->with('success' , 'SalaryMethod deleted successfully !');
    }
}
