<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;
    protected $fillable=[
        'subject',
        'time',
        'from_where',
        'to_where',
        'view_status',
        'status',
        'file',
        'created_by',        
         
    ];
    public function apiuserto()
    {
        return $this->hasOne(ApiUser::class,'id','msg_to');
    }
    public function apiuserfrom()
    {
        return $this->hasOne(ApiUser::class,'id','msg_from');
    }
}
