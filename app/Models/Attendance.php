<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Attendance extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $table = 'attendances';

    protected $fillable = [
        'attendanceDate',
        'startTime',
        'startDate',
        'endTime',
        'endDate',
        'remarks',
        'employee_id',
    ];

    public function employee(){
        return $this->belongsTo('App\Models\Employee','employee_id');
    }

}
