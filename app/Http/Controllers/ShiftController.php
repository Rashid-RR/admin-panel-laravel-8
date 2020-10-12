<?php

namespace App\Http\Controllers;

use App\Models\Shift;
use Illuminate\Http\Request;

class ShiftController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Shift::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('shift.create');
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
            'workingHours' => 'required',
            'startTime' => 'required',
            'endTime' => 'required'
        ]);
        Shift::created($request->all());
        return redirect()->route('shift.index')->with('success' , 'Shift Created Successfully !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Shift  $shift
     * @return \Illuminate\Http\Response
     */
    public function show(Shift $shift)
    {
        return view('shift.show',['shift',$shift]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Shift  $shift
     * @return \Illuminate\Http\Response
     */
    public function edit(Shift $shift)
    {
        return view('shift.edit',['shift' , Shift::findOrFail($shift->id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Shift  $shift
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Shift $shift)
    {
        $this->validate($request,[
            'workingHours' => 'required',
            'startTime' => 'required',
            'endTime' => 'required'
        ]);
        Shift::findOrFail($shift->id)->update($request->all());
        return redirect()->route('shift.index')->with('success' , 'Shift Updated successfully !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Shift  $shift
     * @return \Illuminate\Http\Response
     */
    public function destroy(Shift $shift)
    {
        Shift::findOrFail($shift->id)->delete();
        return redirect()->back()->with('success' , 'Shift deleted successfully !');
    }
}
