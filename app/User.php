<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'username', 'status', 'activation_code'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    /**
    * The attributes that are computed from data.
    *
    * @var array
    **/
    protected $appends = ['profileLink'];
    /**
    * Relation to the post model
    *
    */
    public function posts() {
        return $this->hasMany(Post::class);
    }

    /**
     * Get the route key for the model.
     *
     * @return string
     **/
    public function getRouteKeyName()
    {
        return 'username';
    }
    /**
    * Get User's profile link
    *
    * @return string
    **/
    public function getProfileLinkAttribute()
    {
        return route('user.show', $this);
    }
    /**
    * Relation to Follower table.
    *
    *
    **/
    public function following()
    {
       return $this->belongsToMany(User::class, 'followers', 'user_id', 'follower_id');
    }

    public function isNot($user)
    {
        return $this->id !== $user->id;
    }

    public function isFollowing($user)
    {
        return (bool) $this->following->where('id', $user->id)->count();
    }

    public function canFollow($user)
    {
        if(!$this->isNot($user)) {
            return false;
        }
        return !$this->isFollowing($user);
    }
}
