<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoctorAvailability extends Model
{
    use HasFactory;

    protected $table = 'doctor_availabilities';
    protected $fillable = [
        'user_id',
        'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function timeslot()
{
    return $this->hasOne(Timeslots::class, 'doctor_availability_id');
}


}
