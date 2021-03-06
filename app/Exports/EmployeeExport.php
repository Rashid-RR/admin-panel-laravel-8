<?php

namespace App\Exports;

use App\Models\Employee;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Excel;

class EmployeeExport implements FromCollection , WithHeadings , ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */

    use Exportable;

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
            'shift_id'
            ];
    }


    public function collection()
    {
        return collect(Employee::getEmployee());
    }
    
}
