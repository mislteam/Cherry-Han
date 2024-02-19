<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TourItineary extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'tour_id',
        'title',
        'description',
        'created_by',
    ];
    
    public function tour(){
        return $this->hasOne(Tour::class,'id', 'tour_id');
    }
}
