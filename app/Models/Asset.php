<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Asset extends Model
{
    protected $table = 'assets';
    
    protected $fillable = 
    [
        'name','asset_category_id','used_by','employee_id','maintenance_team_id',
        'technician_id','used_in_location','description','vendor_id','vendor_reference',
        'model','serial_number','effective_date','cost',
        'warranty_expiration_date','preventive_maintenance_frequency','maintenance_duration'
    ];


}
