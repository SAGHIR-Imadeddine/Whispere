<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'friend_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }


    public function friend()
    {
        return $this->belongsTo(User::class, 'friend_id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'conversations', 'user_id', 'friend_id');
    }
    public function messages()
    {
        return $this->hasMany(Message::class,'conversation_id');
    }
    
}
