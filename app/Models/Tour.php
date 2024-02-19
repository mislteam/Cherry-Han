<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    use HasFactory;

    /*protected $fillable = [
        'tour_name',
        'category_id',
        'destination_id',
        'feature_photo',
        'gallery',
        'price',
        'package',
        'passenger',
        'description',
        'include',
        'exclude',
        'status',
    ];*/

    protected $fillable = [
        'tour_name',
        'category_id',
        'destination_id',
        'feature_photo',
        'gallery',
        'price',
        'package',
        'passenger',
        'description',
        'include',
        'exclude',
        'contact_person',
        'phone',
        'email',
        'website',
        'created_by',
        'status',
    ];
    public function tourcategory()
    {
        return $this->hasOne(TourCategory::class, 'id', 'category_id');
    }
    public function tourdestination()
    {
        return $this->hasOne(TourDestination::class, 'id', 'destination_id');
    }

}
