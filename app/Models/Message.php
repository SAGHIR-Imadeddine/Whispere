<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;
<<<<<<< HEAD
    protected $fillable = [
        'conversation_id',
        'user_id',
        'content',
        'media_url'
    ];

    public function user()
{
    return $this->belongsTo(User::class);
}

public function conversation()
{
    return $this->belongsTo(Conversation::class);
}
=======
    public function conversation()
    {
        return $this->belongsTo(Conversation::class);
    }
>>>>>>> 8d24a73f8d527f63a50427972d6f34d8a343da4c
}
