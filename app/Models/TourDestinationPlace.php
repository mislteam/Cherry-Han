<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TourDestinationPlace extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'tour_destination_id',
        'feature_photo',
        'created_by',    
    ];
    public function tourdestination(){
        return $this->hasOne(TourDestination::class, 'id', 'tour_destination_id');
    }

}
