<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubSubCategory extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'category_id',
        'sub_category_id',
        'slug',
        'created_by',
    ];
}
