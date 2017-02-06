# Laravel Medialibrary Demo App

This Laravel app is a quick command line demo of the capabilities of the [`spatie/laravel-medialibrary`](https://github.com/spatie/laravel-medialibrary) package.

Spatie is a webdesign agency based in Antwerp, Belgium. You'll find an overview of all our open source projects [on our website](https://spatie.be/opensource).

## Postcardware

You're free to use this package (it's [MIT-licensed](LICENSE.md)), but if it makes it to your production environment you are required to send us a postcard from your hometown, mentioning which of our package(s) you are using.

Our address is: Spatie, Samberstraat 69D, 2060 Antwerp, Belgium.

The best postcards will get published on the open source page on our website.

## Requirements

See [`spatie/laravel-medialibrary`'s requirements](https://docs.spatie.be/laravel-medialibrary/v5/requirements).

## Installation

You can install the demo application by cloning this repo and running:

``` bash
composer install
```

Next up, fill in your database information in the `.env` file and run the database migrations:

```bash
php artisan migrate
```

By default we'll create some demo tables to run the example commands.

Finally seed the database with the demo information: 

```php
php artisan db:seed
```

Optionally you can modify the `config/laravel-medialibrary.php` and `config/filesystems.php` files to your specific needs.

We've already configured `config/filesystems.php` for you to create a `media` disk in the `storage/app/media` directory.

```php
'media' => [
    'driver' => 'local',
    'root' => storage_path('app/media'),
]
```

## Available examples

We've created some basic examples showing off the capabilities of the medialibrary. In all examples we'll use the `BlogPost` model to add, modify and remove some images and downloads. All available examples can be listed by running:

```php
php artisan list blogpost
```

All example code is available in the `app/Console/Commands` directory and thoroughly documented in the comments.

We've also provided some demo files in the `demofiles` directory.

### 1. Adding media to the blogpost (`BlogPostAddMedia.php`)

Use the following command to a media file to the existing `BlogPost` model. Media files aren't limited to images. Try adding `demofiles/hamlet.pdf` or `demofiles/coolvideo.webm`. You can add as many media files as you want.

```php
php artisan blogpost:addmedia [demofiles/sheep.jpg]
```

### 2. Fetching all associated media from the blogpost (`BlogPostListMedia.php`)

Use the following command to fetch all media associated with the blogpost:

```php
php artisan blogpost:listmedia
```

### 3. 

## Documentation
You'll find the documentation about the `laravel-medialibrary` package on [https://docs.spatie.be/laravel-medialibrary/v5](https://docs.spatie.be/laravel-medialibrary/v5).

Find yourself stuck using the package? Found a bug? Do you have general questions or suggestions for improving the media library? Feel free to [create an issue on GitHub](https://github.com/spatie/laravel-medialibrary/issues), we'll try to address it as soon as possible.

If you've found a bug regarding security please mail [freek@spatie.be](mailto:freek@spatie.be) instead of using the issue tracker.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security

If you discover any security related issues, please email freek@spatie.be instead of using the issue tracker.

## Credits

- [Alex Vanderbist](https://github.com/alexvanderbist)
- [All Contributors](../../contributors)

## About Spatie
Spatie is a webdesign agency based in Antwerp, Belgium. You'll find an overview of all our open source projects [on our website](https://spatie.be/opensource).

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.