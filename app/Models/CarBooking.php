<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarBooking extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'car_id',
        'customer_name',
        'city_id',
        'state_id',
        'country_id',
        'address',
        'phone',
        'depature_date',
        'depature_time',
        'arrival_date',
        'trip_type',
        'day_type',
        'city_to',
        'booking_by',
        'status',
        'note',
    ];
}
