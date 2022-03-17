<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Employee;
use App\Models\Department;

class Contract extends Model
{
    protected $table = 'contracts';
    
    protected $fillable = 
    [
        'reference','employee_id','contract_start_date','contract_end_date','salary_structure_type_id',
        'working_hour_id','department_id','job_position_id','contract_type_id','hr_responsible_id',
        'notes','wage','status_id'
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class,'employee_id');
    }

    public function department()
    {
        return $this->belongsTo(Department::class,'parent_department_id');
    }

}
