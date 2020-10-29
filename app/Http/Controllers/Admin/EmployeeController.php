<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
        $employees = Employee::all();
        return view('admin.employee.index',compact('employees'));
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
        return view('admin.employee.create',compact('departments','designations','locations','shifts'));
        
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
            'firstName' => 'required',
            'lastName' => 'required',
            'gender' => 'required',
            'cnic' => 'required',
            'employeeAddress' => 'required',
            'city' => 'required',
            'country' => 'required',
            'salary' => 'required',
        ]);
        $employee = new Employee;
        $employee->firstName = $request->firstName;
        $employee->lastName = $request->lastName;
        $employee->gender = $request->gender;
        $employee->dob = $request->dob;
        $employee->cnic = $request->cnic;
        $employee->employeeAddress = $request->employeeAddress;
        $employee->email = $request->email;
        $employee->workPhone = $request->workPhone;
        $employee->emergencyPhone = $request->emergencyPhone;
        $employee->homePhone = $request->homePhone;
        $employee->emergencyContact = $request->emergencyContact;
        $employee->country = $request->country;
        $employee->city = $request->city;
        $employee->salary = $request->salary;
        $employee->postalCode = $request->postalCode;
        $employee->employeeCode = $request->employeeCode;
        $employee->hireDate = $request->hireDate;
        $employee->joinDate = $request->joinDate;
        $employee->department_id = $request->department_id;
        $employee->designation_id = $request->designation_id;
        $employee->location_id = $request->location_id;
        $employee->shift_id = $request->shift_id;

        $employee->save();
        
        return redirect()->route('admin.employee.index')->with('success','Employee created successfully !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        return view('admin.employee.detail',['employees' => $employee ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit($employee)
    {
       //dd($id);
       $employee = Employee::findOrFail($employee);
    //    dd($employee);
        return view('admin.employee.edit')->with('employee' , $employee);
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
        return Excel::download(new EmployeeExport, 'employee.csv');
    }
}
