<?php

namespace App\Models\frontend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReceiveOrder extends Model
{
    use HasFactory;
    protected $fillable=[
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
}
