<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Department extends Model
{
    protected $table = 'departments';
    
    protected $fillable = 
    [
        'name','parent_department_id','manager_id','employee_appraisal_template','manager_appraisal_template'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User','manager_id');
    }

}
