<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TourDestination extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'feature_photo',
        'created_by',
        // 'seo_title',
         
    ];
}
