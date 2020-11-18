<?php

namespace App\Http\Controllers\Admin;

use App\Models\Holiday;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HolidayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $holidays = Holiday::all();
        return view('admin.holiday.index',compact('holidays'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.desgination.create');
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
        Holiday::create($request->all());
        return redirect()->back()->with('success','Holiday is created successgully !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Holiday  $Holiday
     * @return \Illuminate\Http\Response
     */
    public function show(Holiday $Holiday)
    {
        return view('admin.holiday.detail',['holiday' => $Holiday]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Holiday  $Holiday
     * @return \Illuminate\Http\Response
     */
    public function edit(Holiday $Holiday)
    {
        return view('holiday.edit',['holiday',Holiday::findOrFail($Holiday->id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Holiday  $Holiday
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $this->validate($request,[
            'name' => 'required'
        ]);
        Holiday::findOrFail($id)->update($request->all());
        return redirect()->back()->with('success','Holiday update successfully !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Holiday  $Holiday
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Holiday::findOrFail($id)->delete();
        return redirect()->back()->with('success','Holiday deleted successfully !');
    }
}
