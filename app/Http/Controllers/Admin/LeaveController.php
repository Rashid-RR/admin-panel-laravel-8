<?php

namespace App\Http\Controllers\Admin;

use App\Models\Leave;
use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;

class LeaveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Leaves = Leave::all();
        $employees = Employee::all();
        return view('admin.leave.index',compact('Leaves','employees'));
    }
    public function Leaves()
    {
        return view('admin.Leave.Leave');
    }
    
    public function holidays()
    {
        return view('admin.Leave.holiday');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'employee_id' => 'required',
            'LeaveDate' => 'required',
            'startTime' => 'required',
            'startDate' => 'required',
            'endTime' => 'required',
            'endDate' => 'required',
            'remarks' => 'required'
        ]);
        $Leave = new Leave;
        $Leave->employee_id = $request->employee_id;
        $Leave->LeaveDate = $request->LeaveDate;
        $Leave->startTime = $request->startTime;
        $Leave->startDate = $request->startDate;
        $Leave->endTime = $request->endTime;
        $Leave->endDate = $request->endDate;
        $Leave->remarks = $request->remarks;

        $Leave->save();
        return redirect()->back()->with('success' , 'Leave created successfully !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Leave  $Leave
     * @return \Illuminate\Http\Response
     */
    public function show(Leave $Leave)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Leave  $Leave
     * @return \Illuminate\Http\Response
     */
    public function edit(Leave $Leave)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Leave  $Leave
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'employee_id' => 'required',
            'LeaveDate' => 'required',
            'startTime' => 'required',
            'startDate' => 'required',
            'endTime' => 'required',
            'endDate' => 'required',
            'remarks' => 'required'
        ]);
        $Leave = Leave::findOrFail($id);
        $Leave->employee_id = $request->employee_id;
        $Leave->LeaveDate = $request->LeaveDate;
        $Leave->startTime = $request->startTime;
        $Leave->startDate = $request->startDate;
        $Leave->endTime = $request->endTime;
        $Leave->endDate = $request->endDate;
        $Leave->remarks = $request->remarks;   

        $Leave->save();
        return redirect()->back()->with('success' , 'Leave update successfully !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Leave  $Leave
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Leave::findOrFail($id)->delete();
        return redirect()->back()->with('success','Leave deleted successfully !');
    }
}
