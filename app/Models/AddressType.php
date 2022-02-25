<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AddressType extends Model
{
    protected $table = 'addresses_type';
    
    protected $fillable = ['name'];
}
