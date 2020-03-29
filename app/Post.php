<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Tags\HasTags;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Spatie\Feed\Feedable;
use Spatie\Feed\FeedItem;

class Post extends Model implements Feedable
{
    use SoftDeletes;
    use HasTags;
    use HasSlug;

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

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('id', 'subject')
            ->saveSlugsTo('slug')
            ->slugsShouldBeNoLongerThan(32)
            ->doNotGenerateSlugsOnUpdate();
    }

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function toFeedItem()
    {
        return FeedItem::create()
            ->id($this->id)
            ->title($this->subject)
            ->summary($this->summary)
            ->updated($this->updated_at)
            ->link($this->slug) // TODO Full URL, or 'link' accessor.
            ->author($this->user()->name); // TODO Name or Email?
    }

    public static function getFeedItems()
    {
        return Post::all();
    }
}
