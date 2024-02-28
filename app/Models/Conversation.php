<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    public function friend()
    {
        return $this->belongsTo(User::class, 'friend_id');
    }
    public function messages()
    {
        return $this->hasMany(Message::class);
    }
}
