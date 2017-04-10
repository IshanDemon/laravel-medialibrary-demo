# Converting images

When working with images you'll often find yourself needing a couple different versions of the same image. For example you might need a smaller thumbnail with a fixed aspect ratio and a wide, blurred banner. This can be achieved by using conversions.

We've already prepared a `BlogPost` model for you that implements the `HasMediaConversions` interface and has a `registerMediaConversions` method shown bellow. Feel free to modify these conversions. All [manipulation methods from `spatie/image`](https://docs.spatie.be/image/v1/image-manipulations/overview) can be applied.

```php
public function registerMediaConversions()
{
    $this->addMediaConversion('thumbnail')
        ->width(300)
        ->height(200)
        ->extractVideoFrameAtSecond(5) // extract the frame 5 seconds in when applicable
        ->sharpen(10);

    $this->addMediaConversion('banner')
        ->fit(Manipulations::FIT_CROP, 800, 200)
        ->apply()
        ->blur(40);
}
```

By default a conversion will be saved as a `.jpg` however this can be changed by calling the `keepOriginalImageFormat` method on the conversion.

More information about defining conversions can be read [in the documentation](https://docs.spatie.be/laravel-medialibrary/v5/converting-images/defining-conversions).

## Adding and converting images

To see the conversions in action upload a file on the right. The medialibrary will automatically create a conversions folder with the derived `.jpg` images, in this case a blurred banner and a small thumbnail.

Feel free to upload another image format as well, for example a gif. You'll see the medialibrary generates still `jpg` frames from the gif with the correct image manipulations applied, amazing!

## Regenerating conversions

After adding a couple of images you might want to change some conversions. Feel free to modify the conversions in the `BlogPost` model. When you're done run the following command to regenerate all conversions on existing media files:

```bash
php artisan medialibrary:regenerate
```
