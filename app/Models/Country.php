<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    protected $fillable = [
        'id', 
        'name',
        'code',
        'phcode',
        'status',
        'car_status',
        'cargo_status',
        'container_status',
        'delivery_status',
        'busticket_status',
        'hotel_status',
        'tour_status',
    ];
}
