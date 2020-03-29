<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Tags\HasTags;

class Post extends Model
{
    use SoftDeletes;
    use HasTags;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'subject', 'summary', 'content', 'overlay', 'views'
    ];

    /**
     * Get the comments belonging to the user.
     */
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    /**
     * Get the reactions belonging to the user.
     */
    public function reactions()
    {
        return $this->hasMany('App\Reaction');
    }

    /**
     * Get the user that the post belongs to.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Get the category that the post belongs to.
     */
    public function category()
    {
        return $this->belongsTo('App\Category');
    }
}
