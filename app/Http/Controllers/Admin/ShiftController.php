<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

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
        $shifts = shift::all();
        return view('admin.shift.index',compact('shifts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.shift.create');
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
            'workingHours' => 'required',
            'startTime' => 'required',
            'endTime' => 'required'
        ]);
        $shiftModal = new Shift;
        $shiftModal->name = $request->name;
        $shiftModal->workingHours = $request->workingHours;
        $shiftModal->startTime = $request->startTime;
        $shiftModal->endTime = $request->endTime;
        $shiftModal->monday = ($request->monday) == '1' ? '1' : '0';
        $shiftModal->tuesday = ($request->tuesday) == '1' ? '1' : '0';
        $shiftModal->wednesday = ($request->wednesday) == '1' ? '1' : '0';
        $shiftModal->thursday = ($request->thursday) == '1' ? '1' : '0';
        $shiftModal->friday = ($request->friday) == '1' ? '1' : '0';
        $shiftModal->saturday = ($request->saturday) == '1' ? '1' : '0';
        $shiftModal->sunday = ($request->sunday) == '1' ? '1' : '0';
        $shiftModal->save();

        return redirect()->route('admin.shift.index')->with('success' , 'Shift Created Successfully !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Shift  $shift
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $shiftByID = Shift::findOrFail($id);
        return view('admin.shift.detail',compact('shiftByID'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Shift  $shift
     * @return \Illuminate\Http\Response
     */
    public function edit(Shift $shift)
    {
        return view('admin.shift.edit',['shift' , Shift::findOrFail($shift->id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Shift  $shift
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'workingHours' => 'required',
            'startTime' => 'required',
            'endTime' => 'required'
        ]);
        $shiftModal = Shift::findOrFail($id);
        $shiftModal->name = $request->name;
        $shiftModal->workingHours = $request->workingHours;
        $shiftModal->startTime = $request->startTime;
        $shiftModal->endTime = $request->endTime;
        $shiftModal->monday = ($request->monday) == '1' ? '1' : '0';
        $shiftModal->tuesday = ($request->tuesday) == '1' ? '1' : '0';
        $shiftModal->wednesday = ($request->wednesday) == '1' ? '1' : '0';
        $shiftModal->thursday = ($request->thursday) == '1' ? '1' : '0';
        $shiftModal->friday = ($request->friday) == '1' ? '1' : '0';
        $shiftModal->saturday = ($request->saturday) == '1' ? '1' : '0';
        $shiftModal->sunday = ($request->sunday) == '1' ? '1' : '0';
        $shiftModal->save();
        return redirect()->route('admin.shift.index')->with('success' , 'Shift Updated successfully !');
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
