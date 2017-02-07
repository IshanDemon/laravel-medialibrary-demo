<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

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

        if (! file_exists($imagePath)) return $this->error('The image you provided doesn\'t exist. Try using demofiles/sheep.jpg as the imagePath'.PHP_EOL);

        $blogpost = BlogPost::find(1);

        $blogpost->addMedia($imagePath) // Add the file to the blogpost
        ->preservingOriginal()      // Create a copy of the file in the media library
        ->toMediaLibrary();         // Copy the file to the configured disk

        $this->info(PHP_EOL."Added {$imagePath} to the blogpost!");

        $media = $blogpost->getMedia()->last();
        $this->line("Medialibrary has automatically copied the file to the media disk:");
        $this->line($media->getPath().PHP_EOL);
    }
}
