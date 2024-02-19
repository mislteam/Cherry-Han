<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContainerPrice extends Model
{
    use HasFactory;
    protected $fillable = [
        'container_id',
        'car_type_id',
        'container_des_from_id',
        'container_des_to_id',
        'price',
        'created_by'
        
    ];
    public function container(){
        return $this->belongsTo(Container::class);
    }
    public function containerdestinationfrom(){
        return $this->hasOne(ContainerDestination::class, 'id', 'container_des_from_id');
    }
    public function containerdestinationto(){
        return $this->hasOne(ContainerDestination::class, 'id', 'container_des_to_id');
    }
     public function cartype(){
        return $this->hasOne(CarType::class, 'id', 'car_type_id');
    }
}
