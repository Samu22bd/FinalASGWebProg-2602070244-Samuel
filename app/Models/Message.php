<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = ['sender_id', 'content', 'avatar_id'];

    public function sender(){
        return $this->belongsTo(User::class, 'sender_id');
    }

    public function recipients(){
        return $this->hasMany(MessageRecepient::class, 'message_id');
    }

    public function avatar(){
        return $this->belongsTo(Avatar::class, 'avatar_id');
    }
}
