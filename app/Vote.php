<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vote extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'vote'
    ];

    /**
     * Get the comment that the vote belongs to.
     */
    public function commment()
    {
        return $this->belongsTo('App\Comment');
    }

    /**
     * Get the user that the vote belongs to.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
