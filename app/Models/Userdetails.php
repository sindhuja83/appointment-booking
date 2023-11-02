<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Userdetails extends Model
{
    use HasFactory;

    protected $table = 'user_details';
    protected $fillable = [
        'user_id',
        'specialist',
        'clinic_name',
        'experience',
        'consultation_fee',
        'address',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }



}
