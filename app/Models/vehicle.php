<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Employee;

class Vehicle extends Model
{
    protected $table = 'vehicles';
    
    protected $fillable = 
    [
        'model','license_plate','driver_id','future_driver_id','assignment_date',
        'chassis_number','fleet_manager_id','location','horsepower_taxation','first_contract_date',
        'catalog_value','purchase_value','residual_value','model_year',
        'transmission','color','horsepower','power','fuel_type','co2_emissions',
        'co2_standard','notes'
    ];

    public function driver()
    {
        return $this->belongsTo(Employee::class,'driver_id');
    }



}
