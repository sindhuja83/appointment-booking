<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Timeslots extends Model
{
    use HasFactory;
    
    protected $table = 'time_slots';
    protected $fillable = [
        'doctor_availability_id',
        'start_time',
        'end_time',
    ];

    public function availability()
    {
        return $this->belongsTo(DoctorAvailability::class, 'doctor_availability_id');
    }
}
