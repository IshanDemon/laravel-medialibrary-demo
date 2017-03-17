<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMediaConversions;
use Spatie\Image\Manipulations;

class BlogPost extends Model implements HasMediaConversions
{
    use HasMediaTrait;

    protected $fillable = [
        'title',
        'content'
    ];

    /**
     * Register the conversions that should be performed.
     *
     * @return array
     */
    public function registerMediaConversions()
    {
        $this->addMediaConversion('thumbnail')
            ->width(300)
            ->height(200)
            ->extractVideoFrameAtSecond(5) // If it's a video; grab the still frame from the 5th second in the video
            ->sharpen(10);

        $this->addMediaConversion('banner')
            ->fit(Manipulations::FIT_CROP, 800, 200)
            ->apply()
            ->blur(40);
    }
}
