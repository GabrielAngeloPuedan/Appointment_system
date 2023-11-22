<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_type',
        'appointment_date',
        'queue_number',
        'last_name',
        'first_name',
        'address',
        'contact_number',
        'concern',
    ];
}
