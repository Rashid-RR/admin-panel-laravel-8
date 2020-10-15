<?php

namespace App\Imports;

//use App\Employee;

use App\Models\Employee;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class EmployeeImport implements ToModel,WithStartRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function startRow(): int
    {
        return 2;
    }
    public function model(array $row)
    {
        return new Employee([
            'firstName' => $row[1],
            'lastName' => $row[2],
            'gender' => $row[3],
            // 'dob' => $row[3],
            // 'cnic' => $row[4],
            // 'employeeAddress' => $row[5],
            // 'city' => $row[6],
            // 'country' => $row[7],
            // 'postalCode' => $row[8],
            // 'homePhone' => $row[9],
            // 'workPhone' => $row[10],
            // 'emergencyContact' => $row[11],
            // 'emergencyPhone' => $row[12],
            // 'emergencyContact' => $row[13],
            // 'email' => $row[14],
            // 'employeeCode' => $row[15],
            // 'hireDate' => $row[16],
            // 'joinDate' => $row[17],
            // 'salary' => $row[18],
            // 'bankName' => $row[19],
            // 'branchName' => $row[20],
            // 'branchCode' => $row[21],
            // 'accountTitle' => $row[22],
            // 'accountNumber' => $row[23],
            // 'department_id' => $row[24],
            // 'designation_id' => $row[25],
            // 'location_id' => $row[26],
            // 'shift_id' => $row[27],
            // 'salaryMethod_id' => $row[28],
        ]);
    }
}
