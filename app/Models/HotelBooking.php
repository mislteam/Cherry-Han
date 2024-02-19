<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HotelBooking extends Model
{
    use HasFactory;

    protected $fillable = [
        'hotel_id',
        'order_id',
        'name',
        'phone',
        'email',
        'address',
        'checkin_date',
        'checkout_date',
        'room_type_id',
        'room_type_name',
        'room_type_price',
        'room_type_catid',
        'no_room',
        'no_person',
        'note',
        'booking_by', // Agent or User
        'status',
    ];
}
