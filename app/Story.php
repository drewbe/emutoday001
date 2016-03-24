<?php

namespace emutoday;

use Illuminate\Database\Eloquent\Model;
use emutoday\StoryImage;

class Story extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'storys';

    /**
         * The attributes that are mass assignable.
         *
         * @var array
         */
    protected $fillable = ['author_id', 'title', 'slug','subtitle', 'teaser', 'content','published_at','story_type'];

    protected $dates = ['published_at'];

    public function setPublishedAtAttribute($value)
    {
        $this->attributes['published_at'] = $value ?: null;
    }
    public function author()
    {
        return $this->belongsTo(User::class);
    }

    public function storyImages()
    {
        return $this->hasMany(StoryImage::class);
    }

    public function getStoryImageByType($value)
    {
        return $storyImage = $this->storyImages()->where('image_type', $value)->first();
    }

}
