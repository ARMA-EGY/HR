<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class AssetsCategory extends Model
{
    protected $table = 'assets_categories';
    
    protected $fillable = 
    [
        'name','responsible_id','comments'
    ];


}
