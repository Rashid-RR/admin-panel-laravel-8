<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CompanyInformation extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $table = 'company_informations';
    protected $fillable = [
        'companyType_id',
        'companyTitle',
        'websiteAddress',
        'email',
        'employeeRange',
        'salaryMethod_id',
        'companyLogo'
    ];

    public function companytype(){
        return $this->belongsTo('App\Models\CompanyType','companyType_id');
    }
    public function salarymethod(){
        return $this->belongsTo('App\Models\SalaryMethod','salaryMethod_id');
    }
}
