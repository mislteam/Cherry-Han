<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarModel extends Model
{
    use HasFactory;

    protected $fillable = [
        'brand_id',
        'name',
        'seo_title',
    ];

    // public function car_brands(){
    //     return $this->belongsToMany(CarBrand::class, 'car_models', 'car_brand_id');
    // }
    public function brand()
    {
        return $this->hasOne(CarBrand::class, 'id', 'brand_id');
    }
    public function car(){
        return $this->hasOne(Car::class);
    }
}
