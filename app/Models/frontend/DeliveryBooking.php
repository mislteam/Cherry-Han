<?php

namespace App\Models\frontend;

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
        'status_info',
        'created_by',
    ];
   
}
