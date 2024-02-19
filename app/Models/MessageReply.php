<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MessageReply extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'message_id',
        'subject',
        'message',
        'time',
        'to_where',
        'from_where',
        'view_status',
        'file',
        'created_by',
    ];
}
