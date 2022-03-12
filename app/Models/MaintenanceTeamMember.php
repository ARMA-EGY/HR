<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class MaintenanceTeamMember extends Model
{
    protected $table = 'maintenance_team_members';
    
    protected $fillable = 
    [
        'maintenance_team_id','member_id'
    ];


}
