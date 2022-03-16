<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\AssetsCategory;
use App\Models\Employee;

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

    public function employee()
    {
        return $this->belongsTo(Employee::class,'employee_id');
    }

    public function vendor()
    {
        return $this->belongsTo(Employee::class,'vendor_id');
    }

    public function category()
    {
        return $this->belongsTo(AssetsCategory::class,'asset_category_id');
    }


}
