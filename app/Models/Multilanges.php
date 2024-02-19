<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Multilanges extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'name', 'db_field', 'states', 'isDefault'];
}
