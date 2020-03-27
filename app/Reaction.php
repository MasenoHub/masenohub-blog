<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reaction extends Model
{
    use SoftDeletes;
    
    /**
     * Get the post that the reaction belongs to.
     */
    public function post()
    {
        return $this->belongsTo('App\Post');
    }

    /**
     * Get the user that the reaction belongs to.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
