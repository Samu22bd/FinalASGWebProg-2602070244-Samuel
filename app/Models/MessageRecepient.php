<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MessageRecepient extends Model
{
    use HasFactory;
    
    protected $fillable = ['message_id', 'receiver_id', 'is_read'];

    public function message(){
        return $this->belongsTo(Message::class, 'message_id');
    }

    public function receiver(){
        return $this->belongsTo(User::class, 'receiver_id');
    }
}
