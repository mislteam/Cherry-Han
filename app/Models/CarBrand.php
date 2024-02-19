<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarBrand extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'seo_title',
    ];

    public function car(){
        return $this->belongsTo(Car::class);
    }
    
    public function container(){
        return $this->belongsTo(Container::class);
    }

    public function cargo(){
        return $this->belongsTo(Cargo::class);
    }
}
