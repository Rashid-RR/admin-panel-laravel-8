<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CompanyType extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'company_types';

    protected $fillable=['name'];

    protected $dates = ['deleted_at'];

    public function companyInformations()
    {
        return $this->hasMany('App\Models\CompanyInformation');
    }

}
