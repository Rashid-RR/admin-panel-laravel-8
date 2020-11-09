<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Department extends Model
{
    use HasFactory;
    
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $table = 'departments';

    protected $fillable = ['deptName'];

    
    
    public function employees()
    {
        return $this->hasMany('App\Models\Employee');
    }
}
