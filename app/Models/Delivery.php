<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'width',
        'height',
        'user_id',
        'day_type',
        'city_id',
        'state_id',
        'country_id',
        'status',
    ];
    
}
