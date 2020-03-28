<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends \TCG\Voyager\Models\User
{
    use Notifiable;
    use SoftDeletes;

    const AUTHOR = 'author';
    const READER = 'reader';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
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
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get the comments belonging to the user.
     */
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    /**
     * Get the posts belonging to the user. 
     */
    public function posts()
    {
        return $this->hasMany('App\Post');
    }

    /**
     * Get the reactions belonging to the user.
     */
    public function reactions()
    {
        return $this->hasMany('App\Reaction');
    }

    /**
     * Get the votes belonging to the user.
     */
    public function votes()
    {
        return $this->hasMany('App\Votes');
    }
}
