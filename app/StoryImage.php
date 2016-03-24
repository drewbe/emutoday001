<?php

namespace emutoday;

use Illuminate\Database\Eloquent\Model;
use emutoday\Story;

class StoryImage extends Model
{
    protected $fillable = ['story_id',
                            'is_active',
                            'is_featured',
                            'image_name',
                            'image_path',
                            'caption',
                            'teaser',
                            'moretext',
                            'image_extension',
                            'image_type'
    ];
    /**
    * All of the relationships to be touched.
    *
    * @var array
    */
    protected $touches = ['story'];

    public function story()
    {
        return $this->belongsTo(Story::class);
    }

    /**
 * The base directory and name convention for thumbnails
 *
 * @return string
 */
public function thumbDirAndPrefix()
{
    return 'thumbnails/thumb-';
}

    public function getThumbnailImagePath()
    {
        return $this->image_path . $this->thumbDirAndPrefix().$this->filename;
    }
    public function getMainImagePath()
	{
        return $this->image_path . $this->filename;
	}

}
