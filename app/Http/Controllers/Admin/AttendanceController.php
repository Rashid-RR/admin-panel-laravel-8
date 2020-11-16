<?php

namespace App\Http\Controllers\Admin;

use App\Models\Attendance;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $attendances = Attendance::all();
        return view('admin.attendance.index',compact('attendances'));
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
            'attendanceDate' => 'required',
            'startTime' => 'required',
            'startDate' => 'required',
            'endTime' => 'required',
            'endDate' => 'required',
            'remarks' => 'required'
        ]);
        $attendance = new Attendance;
        $attendance->employee_id = $request->employee_id;
        $attendance->attendanceDate = $request->attendanceDate;
        $attendance->startTime = $request->startTime;
        $attendance->startDate = $request->startDate;
        $attendance->endTime = $request->endTime;
        $attendance->endDate = $request->endDate;

        $attendance->save();
        return redirect()->back()->with('success' , 'Attendance created successfully !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function show(Attendance $attendance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function edit(Attendance $attendance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'employee_id' => 'required',
            'attendanceDate' => 'required',
            'startTime' => 'required',
            'startDate' => 'required',
            'endTime' => 'required',
            'endDate' => 'required',
            'remarks' => 'required'
        ]);
        $attendance = Attendance::findOrFail($id);
        $attendance->employee_id = $request->employee_id;
        $attendance->attendanceDate = $request->attendanceDate;
        $attendance->startTime = $request->startTime;
        $attendance->startDate = $request->startDate;
        $attendance->endTime = $request->endTime;
        $attendance->endDate = $request->endDate;

        $attendance->save();
        return redirect()->back()->with('success' , 'Attendance update successfully !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Attendance::findOrFail($id)->delete();
        return redirect()->back()->with('success','Attendance deleted successfully !');
    }
}
