<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMediaConversions;

class PhotoAlbum extends Model implements HasMediaConversions
{
    use HasMediaTrait;

    protected $fillable = [
        'title',
        'description'
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
            ->sharpen(10);

        $this->addMediaConversion('banner')
            ->fit(Manipulations::FIT_CROP, 800, 200)
            ->apply()
            ->blur(40);
    }
}
