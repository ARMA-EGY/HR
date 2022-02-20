<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CertificateLevel extends Model
{
    protected $table = 'certificate_level';
    
    protected $fillable = ['name'];
}
