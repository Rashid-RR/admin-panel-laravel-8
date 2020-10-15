<?php

namespace App\Http\Controllers;

use App\Exports\EmployeeExport;
use App\Models\Department;
use App\Models\Designation;
use App\Models\Employee;
use App\Models\Location;
use App\Models\Shift;
use Illuminate\Http\Request;
//use Excel;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\EmployeeImport;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departments = Department::all();
        $designations = Designation::all();
        $locations = Location::all();
        $shifts = Shift::all();
        return view('employee.index',compact('departments','designations','locations','shifts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = Department::all();
        $designations = Designation::all();
        $locations = Location::all();
        $shifts = Shift::all();
        return view('employee.create',compact('departments','designations','locations','shifts'));
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
            'firstName' => 'required',
            'lastName' => 'required',
            'gender' => 'required',
            'cnic' => 'required',
            'employeeAddress' => 'required',
            'city' => 'required',
            'country' => 'required',
            'salary' => 'required',
        ]);
        Employee::created($request->all());
        return redirect()->back()->with('success','Employee created successfully !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        return view('employee.show',['employees' => $employee ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        return view('employee.edit',['employee' => Employee::findOrFail($employee->id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        $this->validate($request,[
            'firstName' => 'required',
            'lastName' => 'required',
            'gender' => 'required',
            'cnic' => 'required',
            'employeeAddress' => 'required',
            'city' => 'required',
            'country' => 'required',
            'salary' => 'required',
        ]);
        Employee::findOrFail($employee->id)->update($request->all());
        return redirect()->back()->with('success','Employee updated successfully !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        Employee::findOrFail($employee->id)->delete();
        return redirect()->back()->with('success','Employee deleted successfully !');
    }

    public function importCSV(Request $request)
    {
        
        Excel::import(new EmployeeImport,$request->file('file'));
        return back();
    }
    public function exportCSV(Request $request)
    {
        return Excel::download(new EmployeeExport, 'employee.xlsx');
    }
}
