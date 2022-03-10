<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobPositions extends Model
{
    protected $table = 'job_positions';
    
    protected $fillable = ['name','job_description','department_id','work_address_id','email','expected_new_employees',
    'recruiter_id','published'];
}
