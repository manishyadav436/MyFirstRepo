<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataVoice extends Model
{
    protected $fillable = [
        'emp_id', 'emp_name', 'country_code','mobile','email','dob','profile',
    ];
}
