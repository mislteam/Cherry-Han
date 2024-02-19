<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusTicketBooking extends Model
{
    use HasFactory;
    protected $fillable=[
        'order_id',
        'busticket_id',
        'from_id',
        'to_id',
        'depature_date',
        'name',
        'phone',
        'email',
        'no_of_seat',
        'booking_by',
        'status',
        'note'

    ];
}
