<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SalaryStructureType extends Model
{
    protected $table = 'salary_structure_type';
    
    protected $fillable = ['contract_type','country_id','working_hour_id'];
}
