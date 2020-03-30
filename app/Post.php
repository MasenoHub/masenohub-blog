<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Spatie\Tags\HasTags;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Spatie\Feed\Feedable;
use Spatie\Feed\FeedItem;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;

class Post extends Model implements Feedable, Searchable
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

    /**
     * Get the post's URL.
     *
     * @return string
     */
    public function getUrlAttribute()
    {
        return route('read', $this->slug);
    }

    /**
     * Get the post's ownership attribute.
     *
     * @return bool
     */
    function getOwnedAttribute()
    {
        if (!!Auth::user()) return Auth::id() === $this->user_id;
        return false;
    }

    /**
     * Get a FeedItem from the model.
     *
     * @return FeedItem
     */
    public function toFeedItem()
    {
        return FeedItem::create()
            ->id($this->id)
            ->title($this->subject)
            ->summary($this->summary)
            ->updated($this->updated_at)
            ->link($this->url)
            ->author($this->user()->email);
    }

    /**
     * Get the items to be included in the feed.
     *
     * @return string
     */
    public static function getFeedItems()
    {
        return Post::where('published', true)->get();
    }

    /**
     * Get the search result fields.
     *
     * @return SearchResult
     */
    public function getSearchResult(): SearchResult
     {
        return new SearchResult(
            $this,
            $this->subject,
            $this->url
         );
     }
}
