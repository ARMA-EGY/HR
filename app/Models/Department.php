<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Employee;
use App\User;

class Department extends Model
{
    protected $table = 'departments';
    
    protected $fillable = 
    [
        'name','parent_department_id','manager_id','custom_appraisal','employee_appraisal_template','manager_appraisal_template'
    ];

    public function manager()
    {
        return $this->belongsTo(Employee::class,'manager_id');
    }

    public function department()
    {
        return $this->belongsTo(Department::class,'parent_department_id');
    }

}
