<?php

namespace App\Models\frontend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryDetailOrder extends Model
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
        'created_by',
    ];

     public function city(){
        return $this->hasOne('App\Models\City','id','delivery_township');
    }
}
