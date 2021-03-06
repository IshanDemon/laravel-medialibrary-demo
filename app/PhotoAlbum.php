<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMedia;

class PhotoAlbum extends Model implements HasMedia
{
    use HasMediaTrait;

    protected $fillable = [
        'title',
        'description'
    ];
}
