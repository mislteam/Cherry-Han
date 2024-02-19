<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryBooking extends Model
{
    use HasFactory;
     protected $fillable=[
        'user_id',
        'sender_name',
        'sender_phone',
        'receiver_name',
        'receiver_phone',
        'pickup_township',
        'delivery_township',
        'weight',
        'del_charges',
        'detail_address',
        'note',
        'status',
        'created_by',
    ];
     public function pickuptownship()
    {
        return $this->hasOne(City::class, 'id', 'pickup_township');
    }
    public function deliverytownship()
    {
        return $this->hasOne(City::class, 'id', 'delivery_township');
    }
}
