<?php

namespace App\Console\Commands;

use App\PhotoAlbum;
use Illuminate\Console\Command;
use Spatie\MediaLibrary\Helpers\File;

class PhotoAlbumAddImage extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'photoalbum:addimage {imagePath}';

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

        $this->comment('Medialibrary has automatically copied the file to the media disk:');
        $this->line($media->getPath().PHP_EOL);

        $this->comment('The following conversions have been generated:');
        $this->line($media->getPath('thumbnail'));      // Get the path to the thumbnail conversion
        $this->line($media->getPath('banner').PHP_EOL); // Get the path to the banner conversion
    }

    protected function isImage (string $path): bool
    {
        return substr($path, 0, 5) == 'image';
    }

    protected function validateImagePath($imagePath)
    {
        if (! file_exists($imagePath)) {
            return $this->error('The image you provided doesn\'t exist. Try using demofiles/otter.jpg as the imagePath'.PHP_EOL);
        }

        if (! $this->isImage(File::getMimetype($imagePath))) {
            return $this->error('The file you provided is not an image...');
        }
    }
}
