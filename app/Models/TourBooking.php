<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TourBooking extends Model
{
    use HasFactory;
    protected $fillable = [
        'tour_id',
        'order_id',
        'name',
        'phone',
        'email',
        'address',
        'no_pessenger',
        'depature_date',
        'depature_time',
        'note',
        'status',
        'booking_by',
    ];
}
