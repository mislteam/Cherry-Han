<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'model_id',
        'car_type_id',
        'brand_id',
        'width',
        'height',
        'length',
        'user_id',
        'trip_type',
        'day_type',
        'city_id',
        'state_id',
        'country_id',
        'seat_no',
        'ac',
        'wheel_drive',
        'abs',
        'airbag',
        'no_of_laggage',
        'service',
        'license_type',
        'driver_id',
        'ownner_id',
        'feature_photo',
        'gallery',
        'status',
    ];

    public function brand()
    {
        return $this->hasOne(CarBrand::class, 'id', 'brand_id');
    }

    public function car_model(){
        return $this->hasOne(CarModel::class, 'id', 'model_id');
    }

    public function driver(){
        return $this->hasOne(CarDriver::class, 'id', 'driver_id');
    }

    public function owner()
    {
        return $this->hasOne(CarOwner::class, 'id', 'ownner_id');
    }

    public function cartype(){
        return $this->hasOne(CarType::class, 'id', 'car_type_id');
    }

    public function state()
    {
        return $this->hasOne(State::class, 'id', 'state_id');
    }
    public function city()
    {
        return $this->hasOne(City::class, 'id', 'city_id');
    }
    public function country()
    {
        return $this->hasOne(Country::class, 'id', 'country_id');
    }

}
