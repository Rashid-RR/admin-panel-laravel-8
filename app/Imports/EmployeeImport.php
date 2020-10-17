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
            'dob' => $row[4],
            'cnic' => $row[5],
            'employeeAddress' => $row[6],
            'city' => $row[7],
            'country' => $row[8],
            'postalCode' => $row[9],
            'homePhone' => $row[10],
            'workPhone' => $row[11],
            'emergencyContact' => $row[12],
            'emergencyPhone' => $row[13],
            'emergencyContact' => $row[14],
            'email' => $row[15],
            'employeeCode' => $row[16],
            'hireDate' => $row[17],
            'joinDate' => $row[18],
            'salary' => $row[19],
            'bankName' => $row[20],
            'branchName' => $row[21],
            'branchCode' => $row[22],
            'accountTitle' => $row[23],
            'accountNumber' => $row[24],
            'department_id' => $row[25],
            'designation_id' => $row[26],
            'location_id' => @$row[27],
            'shift_id' => @$row[28]
        ]);
    }
}
