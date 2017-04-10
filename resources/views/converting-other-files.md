# Converting other files

When using other files like videos or PDFs you'll often want to generate a still image or thumbnail. Medialibrary can do this for you as well.

## Requirements

### Imagick

For a start you'll need to have [`Imagick`](http://php.net/manual/en/imagick.setup.php) installed on your system. It's used to convert `SVG` and `PDF` files to images. Don't forget to update the `image_driver` value in the `medialibrary.php` configuration as well.

You can check whether Imagick is installed by checking the output of `phpinfo()`:

![Imagick in phpinfo](https://docs.spatie.be/images/medialibrary/tutorial/imagick-enabled.jpg)

When using the command line tools the package provides make sure the `Imagick` extension is also enabled for the PHP CLI by running the following command:

```bash
php -me | grep 'imagick'
```

If `imagick` is printed to the console you're good.

### FFmpeg

To generate still frames from video files you'll need the `FFmpeg` framework on your system. Please refer to their [official website](https://ffmpeg.org/download.html) for instructions. You can check whether `FFmpeg` is installed by running the following command:

```bash
ffmpeg -version
```

![ffmpeg installed](https://docs.spatie.be/images/medialibrary/tutorial/ffmpeg-version.jpg)

Remember to add the `php-ffmpeg` package as a dependency to your project as well:

```bash
composer require php-ffmpeg/php-ffmpeg
```

We've already done this for you in the demo project.

## Defining the conversions

The conversions on the `BlogPost` model we've prepared for the previous demo will work just fine for other file types as well. As usual it implements the `HasMediaConversions` interface and has a `registerMediaConversions` method:

```php
    $this->addMediaConversion('thumbnail')
        ->width(300)
        ->height(200)
        ->extractVideoFrameAtSecond(5) // extract the frame 5 seconds in when applicable
        ->sharpen(10);

    $this->addMediaConversion('banner')
        ->fit(Manipulations::FIT_CROP, 800, 200)
        ->apply()
        ->blur(40);
```

## Adding other files to the BlogPost

Try adding one of the following filetypes to the BlogPost: `SVG` (`demofiles/logo.svg`), `WEBM` (`demofiles/coolvideo.webm`) or `PDF` (`demofiles/hamlet.pdf`). You'll see the still `.jpg` conversions are generated just like they would for normal images without any extra configuration. It's that simple.
