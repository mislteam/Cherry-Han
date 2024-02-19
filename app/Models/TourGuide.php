<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TourGuide extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'phone',
        'email',
        'age',
        'gender',
        'nrc',
        'address',
        'country_id',
        'state_id',
        'city_id',
        'tour_exp',
        'tour_license',
        'license_type',
        'rating',
        'language',
        'status',
    ];
}
