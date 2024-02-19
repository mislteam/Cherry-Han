<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;

    protected $fillable=[
        'id',
        'page_name',
        'service_type',
        'banner_photo',
        'banner_type',
        'status',
        'created_by'
    ];
}
