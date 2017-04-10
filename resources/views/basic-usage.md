# Basic usage

In this basic demo we'll use the `PhotoAlbum` model to add, update and remove some media files. 

We've already prepared the `PhotoAlbum` model by implementing `HasMedia` and the `HasMediaTrait`. Read more about preparing your model [in the documentation](https://docs.spatie.be/laravel-medialibrary/v5/basic-usage/preparing-your-model).

You can find most code for this demo in `app/Http/Controllers/PhotoAlbumMediaController.php`.

### Adding media to the photoalbum

Use the dropzone on the right to add media file to the existing `PhotoAlbum` model. Media files aren't limited to images. Try adding `demofiles/hamlet.pdf` or `demofiles/coolvideo.webm`. You can add as many media files as you want.

Read more about adding media files to models in [the documentation](https://docs.spatie.be/laravel-medialibrary/v5/basic-usage/associating-files).

### Fetching all associated media from the photoalbum

For the list of media files on the right we've used the `getMedia` method on the `PhotoAlbum`.

As you can see we've already added some meta data for your media files such as `mime_type`, `human_readable_size` and couple more available on the `Media` object.  

### Updating associated media

As you can see from the previous example, every media file received a name and filename. You can easily update these names the way you're used to in Eloquent models.

```php
$media->name = "New name";
$media->save();
```

### Deleting media files

The medialibrary provides a `delete` method to delete a single media association. This method will also remove the file from your filesystem, in this case the `storage/app/media` directory.

```php
$media->delete();
```

The 'Delete all' button uses the `clearMediaCollection` method on the `PhotoAlbum` model to delete all associated media files.
