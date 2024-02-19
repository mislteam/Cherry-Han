<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarDriver extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'phone',
        'email',
        'age',
        'gender',
        'address',
        'language',
        'country_id',
        'state_id',
        'city_id',
        'tour_exp',
        'drive_exp',
        'license_type',
        'rating',
        'demage',
        'status',
        'car_drivers',
    ];


    public function car(){
        return $this->belongsTo(Car::class);
    }

    public function container(){
        return $this->belongsTo(Container::class);
    }

    /*Address*/
    public function country(){
        return $this->hasOne(Country::class, 'id', 'country_id');
    }

    public function state(){
        return $this->hasOne(State::class, 'id', 'state_id');
    }

    public function city()
    {
        return $this->hasOne(City::class, 'id', 'city_id');
    }
}
