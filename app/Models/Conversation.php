<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
<<<<<<< HEAD
    use HasFactory;



    protected $fillable = [
        'user_id',
        'friend_id'
    ];

=======
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
>>>>>>> 8d24a73f8d527f63a50427972d6f34d8a343da4c

    public function friend()
    {
        return $this->belongsTo(User::class, 'friend_id');
    }
<<<<<<< HEAD

    public function users()
{
    return $this->belongsToMany(User::class, 'conversations', 'user_id', 'friend_id');
}
public function messages()
{
    return $this->hasMany(Message::class);
}

=======
    public function messages()
    {
        return $this->hasMany(Message::class);
    }
>>>>>>> 8d24a73f8d527f63a50427972d6f34d8a343da4c
}
