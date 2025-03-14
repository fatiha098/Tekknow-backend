<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = ['sender_id', 'receiver_id', 'message'];

    // The sender of the message
    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }

    // The receiver of the message
    public function receiver()
    {
        return $this->belongsTo(User::class, 'receiver_id');
    }
}
