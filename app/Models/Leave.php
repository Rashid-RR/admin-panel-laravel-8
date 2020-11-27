<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Leave extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['category','hours','fromDate','toDate','balance','action','reason','employee_id'];
    protected $dates = ['deleted_at'];

    public function employee(){
        return $this->belongsTo('App\Models\Employee','employee_id');
    }
}
