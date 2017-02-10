<?php

namespace App\Console\Commands;

use App\PhotoAlbum;
use Illuminate\Console\Command;
use InvalidArgumentException;
use Spatie\MediaLibrary\Helpers\File;

class PhotoAlbumAddImage extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'photoalbum:add-image {imagePath}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Adds an image to the photoalbum.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $imagePath = $this->argument('imagePath');

        $this->validateImagePath($imagePath);

        $photoAlbum = PhotoAlbum::find(1);

        $photoAlbum->addMedia($imagePath) // Add the file to the photoAlbum
            ->preservingOriginal()        // Create a copy of the file in the media library
            ->toMediaLibrary();           // Copy the file to the configured disk

        $this->info(PHP_EOL."Added {$imagePath} to the PhotoAlbum!");

        $media = $photoAlbum->getMedia()->last();

        $this->comment("Medialibrary has automatically copied the file to the media disk. Full path to media: `{$media->getPath()}`");

        $this->comment('The following conversions have been generated:');
        $this->line("Path to thumbnail conversion: `{$media->getPath('thumbnail')}`");
        $this->line("Path to banner conversion: `{$media->getPath('banner')}`");
    }

    protected function isImage (string $path): bool
    {
        return substr($path, 0, 5) === 'image';
    }

    protected function validateImagePath(string $imagePath)
    {
        if (! file_exists($imagePath)) {
            throw new InvalidArgumentException("There doesn't exist a file at path `{$imagePath}`. Try using demofiles/otter.jpg as the imagePath");
        }

        $mimeType = File::getMimetype($imagePath);

        if (! $this->isImage(File::getMimetype($imagePath))) {
            throw new InvalidArgumentException("The file you provided is not an image. It has mime type `{$mimeType}`");
        }
    }
}
