<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PointSetting extends Model
{
    use HasFactory;
      protected $fillable=[
        'user_id',
        'coin_id',
        'collected_point',
        'use_point',
        'coin_type',
        'coin_des',
        'coin_status',
        'point_status',
        'collect_date',
        'coin_expire_date',     
    ];
    public function apiuser()
    {
        return $this->hasOne(ApiUser::class, 'id', 'user_id');
    }
}
