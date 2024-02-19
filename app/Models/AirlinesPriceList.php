<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AirlinesPriceList extends Model
{
    use HasFactory;

    protected $fillable=[
        'id',
        'airline_id',
        'package_name',
        'price',
        'usprice',
        'isRefund',
        'refund_description',
        'created_by',
        'updated_by',
        'status'
    ];

    function airline(){
        return $this->hasOne(Airline::class, 'id', 'airline_id');
    }
}
