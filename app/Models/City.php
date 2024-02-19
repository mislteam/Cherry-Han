<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'state_id',
        'country_id',
        'status',
        'car_status',
        'cargo_status',
        'container_status',
        'delivery_status',
        'busticket_status',
        'hotel_status',
        'tour_status' 
    ];
    
     public function country(){
        return $this->hasOne(Country::class,'id','country_id');
    }
    
    public function state(){
        return $this->hasOne(State::class,'id','state_id');
    }
   
    public function delivery_charges(){
        return $this->hasOne(DeliveryCharges::class,'city_id','id');
    }
}
