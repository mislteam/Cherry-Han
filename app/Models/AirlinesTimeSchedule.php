<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AirlinesTimeSchedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'airline_id',
        'business_type',
        'airline_code',
        'depart_date',
        'depart_time',
        'arrival_time',
        'fromAirport',
        'toAirport',
        'baggage_kg',
        'status',
        'price_list',
        'created_by',
        'updated_by'
    ];
}
