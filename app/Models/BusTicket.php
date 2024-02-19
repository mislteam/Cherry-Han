<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusTicket extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'phone',
        'email',
        'address',
        'country_id',
        'state_id',
        'city_id',
        'bus_type',
        'price',
        'feature_photo',
        'destination_id',
        'bus_gate_id',
        'no_seat',
        'available_seat',
        'note',
        'cteated_by',
        // 'updated_by',
        'status',        
    ];
    public function country()
    {
        return $this->hasOne(Country::class, 'id', 'country_id');
    }

    public function city(){
        return $this->hasOne(City::class, 'id', 'city_id');
    }
    public function state(){
        return $this->hasOne(State::class, 'id', 'state_id');
    }
    public function busgate(){
        return $this->hasOne(BusGate::class, 'id','bus_gate_id');
    }
}
