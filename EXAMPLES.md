# Medialibrary examples

## Table of Contents

<!-- toc -->

- [Introduction](#introduction)
- [Basic usage (`BlogPost`)](#basic-usage-blogpost)
  * [Adding media to the blogpost (`BlogPostAddMedia.php`)](#adding-media-to-the-blogpost-blogpostaddmediaphp)
  * [Fetching all associated media from the blogpost (`BlogPostListMedia.php`)](#fetching-all-associated-media-from-the-blogpost-blogpostlistmediaphp)
  * [Updating associated media (`BlogPostUpdateMedia.php`)](#updating-associated-media-blogpostupdatemediaphp)
  * [Delete media files (`BlogPostDeleteMedia.php`)](#delete-media-files-blogpostdeletemediaphp)
- [Image conversions (`PhotoAlbum`)](#image-conversions-photoalbum)
- [Converting other files (`Article`)](#converting-other-files-article)
- [Advanced usage](#advanced-usage)

<!-- tocstop -->

## Introduction

All available examples are available as commands and can be listed by using the `list` command:

```php
php artisan list blogpost
```

All example code is available in the `app/Console/Commands` directory and thoroughly documented in the comments.

We've also provided some demo files in the `demofiles` directory.

## Basic usage (`BlogPost`)

In these basic examples we'll use the `BlogPost` model to add, update and remove some media files. If you've ran the migrations and the `db:seed` command you should also have a demo blogpost.

We've already prepared the `BlogPost` model to implement `HasMedia` and the `HasMediaTrait`.

Read more about preparing your model [in the documentation](https://docs.spatie.be/laravel-medialibrary/v5/basic-usage/preparing-your-model).

### Adding media to the blogpost (`BlogPostAddMedia.php`)

Use the following command to a media file to the existing `BlogPost` model. Media files aren't limited to images. Try adding `demofiles/hamlet.pdf` or `demofiles/coolvideo.webm`. You can add as many media files as you want.

```php
php artisan blogpost:addmedia demofiles/sheep.jpg
```

As you can see, the media file is automatically _copied_ to the configured storage disk. This is because we used the `preservingOriginal` method. If you want to move the media file to the disk instead of copying it you can ignore this method.

Read more about adding media files to models in [the documentation](https://docs.spatie.be/laravel-medialibrary/v5/basic-usage/associating-files).

### Fetching all associated media from the blogpost (`BlogPostListMedia.php`)

Use the following command to fetch all media associated with the blogpost:

```php
php artisan blogpost:listmedia
```

As you can see we've automagically added some meta data for your media files such as `mime_type`, `size` and `human_readable_size`.

### Updating associated media (`BlogPostUpdateMedia.php`)

As you can see from the previous example, every media file received a name and filename. You can easily update these names the way you're used to in Eloquent models.

```php
php artisan blogpost:updatemedia {id} --name="new name" --filename="new-filename.jpg"
```

### Delete media files (`BlogPostDeleteMedia.php`)

The medialibrary provides a `delete` method to delete a single media association. This method will also remove the file from your filesystem.

```php
php artisan blogpost:deletemedia {id}
```

As you can see, the directory in `storage/app/media` with the `Media`'s `id` has been removed as well.

To delete all media files associated with a model you can use the `clearMediaCollection` method.

```php
php artisan blogpost:deletemedia
```

As you can see, all of the media directories associated with the `BlogPost` have now been removed from `storage/app/media` directory.

## Image conversions (`PhotoAlbum`)

## Converting other files (`Article`)

## Advanced usage
