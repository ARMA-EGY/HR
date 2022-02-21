<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmployeesTypes extends Model
{
    protected $table = 'employees_types';
    
    protected $fillable = ['name'];
}
