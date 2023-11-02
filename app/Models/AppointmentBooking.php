<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppointmentBooking extends Model
{
    use HasFactory;


    protected $table = 'appointment_bookings';
    protected $fillable = [
        'user_id_from',
        'user_id_to',
        'time_slot_id',
        'date',
        'status',
    ];

    public function user()
{
    return $this->belongsTo(User::class, 'user_id_to', 'id');
}

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id_from');
    }
    
    public function timeslot()
    {
        return $this->belongsTo(Timeslots::class, 'time_slot_id');
    } 

}
