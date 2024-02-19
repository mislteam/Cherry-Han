<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusGate extends Model
{
    use HasFactory;
    use HasFactory;
    protected $fillable=[
        'id',
        'name',
        'phone',
        'email',
        'address',
        'note',
        'status',
        // 'created_by',
    ];
   
    
}
