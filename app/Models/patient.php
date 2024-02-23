<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    
    protected $fillable = ['name', 'dob', 'sex','booking_time','doctor','specialization'];
}
