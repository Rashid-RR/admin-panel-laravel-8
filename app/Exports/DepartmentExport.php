<?php

namespace App\Exports;

use App\Models\Department;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DepartmentExport implements FromCollection,WithHeadings,ShouldAutoSize
{
    use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */

    public function headings():array
    {   
        return[
            'deptName'
        ];
    }

    public function collection()
    {
        return collect(Department::getDepartment());
    }
}