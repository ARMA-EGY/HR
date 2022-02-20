<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WorkLocation extends Model
{
    protected $table = 'work_locations';
    
    protected $fillable = ['name','work_address_id','location_number'];
}
