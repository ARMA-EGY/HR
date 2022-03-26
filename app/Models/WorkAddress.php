<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Employee;

class WorkAddress extends Model
{
    protected $table = 'work_addresses';
    
    protected $fillable = 
    [
        'individual_company','name','address_type_id','street','street2',
        'city','state','zip','country_id','tax_id',
        'job_position','phone','mobile','email','website','title_id'
        ,'tag_id','language'
    ];

}
