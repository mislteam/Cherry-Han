<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Container extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name',
        'brand_id',
        'model_id',
        'width',
        'height',
        'length',        
        'wheel_drive',
        'license_type',
        'service',
        'driver_id',
        'ownner_id',
        'feature_photo',
        'gallery',
        'booking_status',
        'booking_for',
        'status',
        'created_at',
        'created_by',
        'updated_at'
    ];

    public function brand()
    {
        return $this->hasOne(CarBrand::class, 'id', 'brand_id');
    }

    public function car_model(){
        return $this->hasOne(CarModel::class, 'id', 'model_id');
    }

    public function cartype(){
        return $this->hasOne(CarType::class, 'id', 'car_type_id');
    }

    public function driver(){
        return $this->hasOne(CarDriver::class, 'id', 'driver_id');
    }

    public function owner()
    {
        return $this->hasOne(CarOwner::class, 'id', 'ownner_id');
    }

    public function country(){
        return $this->hasOne(Country::class, 'id', 'coutntry_id');
    }

    public function state(){
        return $this->hasOne(State::class, 'id', 'state_id');
    }

    public function city(){
        return $this->hasOne(City::class, 'id', 'city_id');
    }
    public function containerprice(){
        return $this->hasOne(ContainerPrice::class, 'container_id', 'id');
    }
  
}
