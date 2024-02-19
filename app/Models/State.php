<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'country_id',
        'status',
        'car_status',
        'cargo_status',
        'container_status',
        'delivery_status',
        'busticket_status',
        'hotel_status',
        'tour_status',
    ];
    
     public function country(){
        return $this->hasOne(Country::class,'id','country_id');
    }
}
