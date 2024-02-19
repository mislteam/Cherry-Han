<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HotelRoomType extends Model
{
    use HasFactory;
    protected $fillable = [
        'hotel_id',
        'room_name',
        'price',
        'description',
        //'room_type_catid',
        //'no_people',
    ];
}
