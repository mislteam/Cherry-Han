<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Airline extends Model
{
    use HasFactory;

    protected $fillable=[
        'id',
        'name',
        'feature_photo',
        'phone',
        'email',
        'status'
    ];

    public function airline(){
        return $this->belongsTo(Airline::class);
    }
}
