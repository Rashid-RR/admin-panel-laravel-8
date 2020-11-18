<?php

namespace App\Imports;

//use App\Employee;

use App\Models\Employee;
use Illuminate\Contracts\Validation\Rule;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Validators\Failure;

class EmployeeImport implements ToModel,WithStartRow
{
    use Importable;
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
        dd($row);
        if(!Employee::where('cnic', '=', $row[4])->exists()){
            return new Employee([
                'firstName' => $row[0],
                'lastName' => $row[1],
                'gender' => $row[2],
                'dob' => \DateTime::createFromFormat('d/m/Y', $row[3])->format('Y-m-d'),
                'cnic' => $row[4],
                'employeeAddress' => $row[5],
                'city' => $row[6],
                'country' => $row[7],
                'postalCode' => $row[8],
                'homePhone' => $row[9],
                'workPhone' => $row[10],
                'emergencyContact' => $row[11],
                'emergencyPhone' => $row[12],
                'email' => $row[13],
                'employeeCode' => $row[14],
                'hireDate' => \DateTime::createFromFormat('d/m/Y', $row[15])->format('Y-m-d'),
                'joinDate' => \DateTime::createFromFormat('d/m/Y', $row[16])->format('Y-m-d'),
                'salary' => $row[17],
                'bankName' => $row[18],
                'branchName' => $row[19],
                'branchCode' => $row[20],
                'accountTitle' => $row[21],
                'accountNumber' => $row[22],
                'department_id' => $row[23],
                'designation_id' => $row[24],
                'location_id' => $row[25],
                'shift_id' => $row[26]
            ]);
        }
    }
}