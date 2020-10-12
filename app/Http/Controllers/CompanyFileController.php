<?php

namespace App\Http\Controllers;

use App\Models\CompanyFile;
use Illuminate\Http\Request;

class CompanyFileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return CompanyFile::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('companyFile.create');
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
            'docType' => 'required',
            'docName' => 'required',
            'fileName' => 'required',
            'excessRights' => 'required',
        ]);
        CompanyFile::created($request->all());
        return redirect()->route('companyFile.index')->with('success','CompanyFile created successfully !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CompanyFile  $companyFile
     * @return \Illuminate\Http\Response
     */
    public function show(CompanyFile $companyFile)
    {
        return view('companyFile.index',['companyFile' => $companyFile]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CompanyFile  $companyFile
     * @return \Illuminate\Http\Response
     */
    public function edit(CompanyFile $companyFile)
    {
        return view('companyFile.edit',['companyFile' => CompanyFile::findOrFail($companyFile->id)]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CompanyFile  $companyFile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CompanyFile $companyFile)
    {
        $this->validate($request,[
            'docType' => 'required',
            'docName' => 'required',
            'fileName' => 'required',
            'excessRights' => 'required',
        ]);
        CompanyFile::findOrFail($companyFile->id)->update($request->all());
        return redirect()->route('companyFile.index')->with('success','CompanyFile update successfully !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CompanyFile  $companyFile
     * @return \Illuminate\Http\Response
     */
    public function destroy(CompanyFile $companyFile)
    {
        CompanyFile::findOrFail($companyFile->id)->delete();
        return redirect()->route('companyFile.index')->with('success','CompanyFile deleted successfully !');
    }
}
