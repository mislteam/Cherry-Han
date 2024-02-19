<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContainerBooking extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'container_id',
        'customer_name',
        'from_place',
        'to_place',
        'way_type',
        'no_way',
        'price',
        'address',
        'phone',
        'depature_date',
        'pickup_time',
        'from_city',
        'to_city',
        'booking_by',
        'status',
        'note',
    ];
}
