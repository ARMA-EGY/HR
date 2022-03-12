<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class MaintenanceTeam extends Model
{
    protected $table = 'maintenance_teams';
    
    protected $fillable = 
    [
        'name'
    ];


}
