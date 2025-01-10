<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserHobby extends Model
{
    use HasFactory;

    // protected $table = 'user_hobbies';
    protected $guarded = [];

    public function user(){
        return $this->belongsToMany(User::class,'users', 'user_id', 'id');
    }

    public function hobby(){
        return $this->belongsToMany(Hobby::class, 'hobbies', 'hobby_id', 'id');
    }
}
