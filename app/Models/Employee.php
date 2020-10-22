<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
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

    public static function getEmployee()
    {
        $records = DB::table('employees')->select(
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
        'shift_id')
        ->orderBy('id', 'asc')->get()->toArray();

        return $records;
    }
    public function designation()
    {
        return $this->belongsTo('App\Models\Designation');
    }
    public function department()
    {
        return $this->belongsTo('App\Models\Department');
    }
}
