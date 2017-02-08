<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMediaConversions;

class Article extends Model implements HasMediaConversions
{
    use HasMediaTrait;

    protected $fillable = [
        'title',
        'content',
    ];


    /**
     * Register the conversions that should be performed.
     *
     * @return array
     */
    public function registerMediaConversions()
    {
        // General downloads should get a thumbnail
        $this->addMediaConversion('thumbnail')
            ->width(360)
            ->height(230)
            ->extractVideoFrameAtSecond(5) // Grab the still frame from the 5th second in the video
            ->performOnCollections('downloads');
    }
}
