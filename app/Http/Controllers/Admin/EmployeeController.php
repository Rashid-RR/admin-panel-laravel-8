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
use App\Models\Document;
use App\Models\DocumentType;
use Dotenv\Exception\ValidationException;
use File;

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
            'profile' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $employee = new Employee;
        $document = new Document;
        

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

        if($request->file('profile')){
            $file = $request->profile;
            $imageName = time().'.'.$file->extension();
            $file->move(public_path('employeesProfile'), $imageName);
            $employee->profile = $imageName;
        }

        $employee->save();

        if($request->name && $request->expiryDate && $request->type){
            $document->name = $request->name;
            $document->expiryDate = $request->expiryDate;
            $document->documentType_id = $request->type;
            $document->employee_id = $employee->id;
            if($request->file('image')){
                $file = $request->image;
                $imageName = time().'.'.$file->extension();
                $file->move(public_path('employeesDocument'), $imageName);
                $document->image = $imageName;
            }
            $document->save();
        }
        
        return redirect()->route('admin.employee.index')->with('success','Employee created successfully !');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $empById = Employee::findOrFail($id);
        $documentById = Document::where('employee_id',$empById->id)->first();
        $documentTypeById = '';
        if($documentById != null){
            $documentTypeById = DocumentType::findOrFail($documentById->documentType_id);
        }
        return view('admin.employee.detail',compact('empById','documentById','documentTypeById'));
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
       $departments = Department::all();
       $designations = Designation::all();
       $locations = Location::all();
       $shifts = Shift::all();
       $documentById = Document::where('employee_id',$employee->id)->first();
       $documentTypeById = '';
       if($documentById != null){
        $documentTypeById = DocumentType::findOrFail($documentById->documentType_id);
       }
       
       return view('admin.employee.edit',compact('employee','departments','designations','locations','shifts','documentById','documentTypeById'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
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
            'profile' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $employee = Employee::findOrFail($id);
        $document = Document::where('employee_id',$id)->first();

        if($document != null){
            $document->name = $request->name;
            $document->expiryDate = $request->expiryDate;
            $document->documentType_id = $request->type;
            if($request->file('image')){
                $file = $request->image;
                $imageName = time().'.'.$file->extension();
                $file->move(public_path('employeesDocument'), $imageName);
                $document->image = $imageName;
            }
            $document->employee_id = $employee->id;
            $document->save();
        }
        else{
            $document = new Document;
            $document->name = $request->name;
            $document->expiryDate = $request->expiryDate;
            $document->documentType_id = $request->type;
            if($request->file('image')){
                $file = $request->image;
                $imageName = time().'.'.$file->extension();
                $file->move(public_path('employeesDocument'), $imageName);
                $document->image = $imageName;
            }
            $document->employee_id = $employee->id;
            $document->save();
        }

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

        

        if($request->file('profile')){
            $file = $request->profile;
            $imageName = time().'.'.$file->extension();
            $file->move(public_path('employeesProfile'), $imageName);
            $employee->profile = $imageName;
        }

        $employee->save();
        
        
        return redirect()->route('admin.employee.index')->with('success','Employee updated successfully !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Employee::findOrFail($id)->delete();
        return redirect()->back()->with('success','Employee deleted successfully !');
    }

    public function importCSV()
    {
     //   dd(File::files(public_path('employeeSheet')));

        //$file=base_path('employeeSheet/'.'1604407940675employee');
        $sheet = File::get(public_path('employeeSheet/1604407940675employee.csv'));
        //Excel::import(new EmployeeImport,$request->file('file'));
        dd($sheet);
        Excel::import(new EmployeeImport,$sheet);
        return back();
    }
    public function importCSV2(Request $request)
    {
        $employeeSheet = $request->file('file');
        $sheetName = time().'.'.$employeeSheet->extension();
        $employeeSheet->move(public_path('employeeSheet'),$sheetName);
        Excel::import(new EmployeeImport,$request->file('file'));
    }
    public function exportCSV(Request $request)
    {
        return (new EmployeeExport)->download('employee.csv');
    }
    public function exportEXCEL(Request $request)
    {
        return (new EmployeeExport)->download('employee.xlsx');
    }
}
