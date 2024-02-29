<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'profile_image',
        'unique_identifier',
        'provider',
        'provider_id',
        'provider_token',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',

    ];

    public function sentFriendRequests()
    {
        return $this->hasMany(FriendRequest::class, 'user_id');
    }


    public function receivedFriendRequests()
    {
        return $this->hasMany(FriendRequest::class, 'friend_id'); //->where('request_status', 'pending')->get();

    }

    public function friends()
    {
        return $this->belongsToMany(User::class, 'friend_requests', 'user_id', 'friend_id')
            ->wherePivot('request_status', 'accepted');
    }

    public function conversations()
    {
        return $this->hasMany(Conversation::class, 'user_id');
    }
}
