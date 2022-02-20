<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Employee extends Model
{
    protected $table = 'employees';
    
    protected $fillable = 
    [
        'name','job_position','work_mobile','work_phone','work_email',
        'department_id','manager_id','coach_id','work_address_id','work_location_id',
        'working_hour_id','address_id','language_id','home_work_distance',
        'nationality_id','identification_no','passport','gender','dateofbirth','placeofbirth',
        'countryofbirth_id','maritalstatus_id','no_ofchildren','emergency_contact','emergency_phone',
        'visa_no','work_permit_no','visa_expire_date','work_permit_expire_date','certificate_level_id',
        'field_of_study','school','type_id'
    ];

    public function user()
    {   
        return $this->belongsTo('App\Models\User','manager_id');
    }

    public function contracts(){
        return $this->hasMany('App\Models\Contract','employee_id');
    }

    public function activeContracts(){
        return $this->hasMany('App\Models\Contract','employee_id')->where('status_id','==', 2);
    }

}
