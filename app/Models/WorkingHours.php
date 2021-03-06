<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WorkingHours extends Model
{
    protected $table = 'working_hours';
    
    protected $fillable = ['name','average_hour_per_day'];

    public function WorkingHoursSchedule(){
        return $this->hasMany('App\Models\WorkingHoursSchedule','working_hour_id');
    }
}
