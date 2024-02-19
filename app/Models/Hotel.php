<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'feature_photo',
        'phone',
        'email',
        'website',
        'address',
        'description',
        'gallery',
        'country_id',
        'state_id',
        'city_id',
        'star_level',
        'service',
        'status',
    ];

    public function country()
    {
        return $this->hasOne(Country::class, 'id', 'country_id');
    }
    
    public function state()
    {
        return $this->hasOne(State::class, 'id', 'state_id');
    }
    
    public function city()
    {
        return $this->hasOne(City::class, 'id', 'city_id');
    }
   
    
}
