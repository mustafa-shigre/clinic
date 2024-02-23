<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $fillable = ['patient_id', 'doctor_id', 'available_date_id'];
    protected $table = 'bookings';
    protected $with=['patient','availableDate'];
    public function patient()
    {
        return $this->belongsTo(Patient::class, 'patient_id');
    }

    public function availableDate()
    {
        return $this->belongsTo(AvailableDate::class);
    }
}
