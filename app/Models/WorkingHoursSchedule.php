<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WorkingHoursSchedule extends Model
{
    protected $table = 'working_hours_schedule';
    
    protected $fillable = ['working_hour_id','name','day_of_week','day_period','work_from','work_to'];

    public function workingHours()
    {   
        return $this->belongsTo('App\Models\WorkingHours','working_hour_id');
    }
}
