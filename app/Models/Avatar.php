<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Avatar extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'file_path',
    ];

    public function user(){
        return $this->belongsToMany(User::class, 'user_avatars', 'avatar_id', 'user_id');
    }

    public function message(){
        return $this->hasMany(Message::class, 'avatar_id');
    }
}
