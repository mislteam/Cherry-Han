<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CargoBooking extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'cargo_id',
        'customer_name',
        'start_place',
        'end_place',
        'phone',
        'depature_date',
        'booking_by',
        'status',
        'note'
    ];
}
