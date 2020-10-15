<?php

namespace App\Exports;

use App\Models\Employee;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Excel;

class EmployeeExport implements FromCollection , WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */


    public function headings(): array
    {
        return [
            'firstName',
            'lastName',
            'gender',
            'dob',
            'cnic',
            'employeeAddress',
            'city',
            'country',
            'postalCode',
            'homePhone',
            'workPhone',
            'emergencyContact',
            'emergencyPhone',
            'emergencyContact',
            'email',
            'employeeCode',
            'hireDate',
            'joinDate',
            'salary',
            'bankName',
            'branchName',
            'branchCode',
            'accountTitle',
            'accountNumber',
            'department_id',
            'designation_id',
            'location_id',
            'shift_id',
            'salaryMethod_id'
            ];
    }


    public function collection()
    {
        return collect(Employee::getEmployee());
    }
    
}
