<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContainerDestination extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'state_id',
        'created_by'
        
    ];
    public function state(){
        return $this->hasOne(State::class,'id','state_id');
    }
}
