**THIS DEMO IS CURRENTLY IN DEVELOPMENT, DO NOT USE. ETA FOR COMPLETE VERSION: APRIL 2017**

# Laravel Medialibrary Demo App

This Laravel app is a quick demo of some the capabilities of the [`spatie/laravel-medialibrary`](https://github.com/spatie/laravel-medialibrary) package.

We've created a UI for some basic features like uploading media to different collections and creating different conversions. This way you can quickly start messing around with the features of the medialibrary package! Every demo comes with a small explanation of what's going on as well.

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

Next up, create a copy of the `.env.example` file named `.env`:

```bash
cp .env.example .env
```

Open the `.env` file in your favourite editor and fill in your database information, then run the migrations and seeder:

```bash
php artisan migrate --seed
```

And that's it, you're done! Open the application in your browser and start messing around. You can find all code for the demo in `app` directory.

Optionally you can modify the `config/laravel-medialibrary.php` and `config/filesystems.php` files to your specific needs.

We've already configured `config/filesystems.php` for you to create a `media` disk in the `storage/app/media` directory.

```php
'media' => [
    'driver' => 'local',
    'root' => storage_path('app/media'),
]
```

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
