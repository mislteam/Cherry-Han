<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarType extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'service_type',
    ];

    /*public function container(){
        return $this->belongsTo(Container::class);
    }*/
}
