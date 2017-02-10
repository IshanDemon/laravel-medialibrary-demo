<?php

namespace App\Console\Commands;

use App\BlogPost;
use Illuminate\Console\Command;

class BlogPostAddMedia extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'blogpost:add-media {mediaPath=demo/sheep.jpg}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Adds media to the example blogpost.';

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
        $mediaPath = $this->argument('mediaPath');

        if (! file_exists($mediaPath)) {
            return $this->error('The file you provided doesn\'t exist. Try using demofiles/sheep.jpg as the mediaPath'.PHP_EOL);
        }

        $blogPost = BlogPost::find(1);

        $blogPost->addMedia($mediaPath) // Add the file to the blogPost
            ->preservingOriginal()      // Create a copy of the file in the media library
            ->toMediaLibrary();         // Copy the file to the configured disk

        $this->info(PHP_EOL."Added {$mediaPath} to the blogPost!");

        $media = $blogPost->getMedia()->last();
        $this->line('Medialibrary has automatically copied the file to the media disk:');
        $this->line($media->getPath().PHP_EOL);
    }
}
