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
    protected $signature = 'blogpost:addmedia {mediaPath=demo/sheep.jpg}';

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

        if (! file_exists($mediaPath)) return $this->error('The file you provided doesn\'t exist. Try using demofiles/sheep.jpg as the mediaPath');

        $blogpost = BlogPost::find(1);

        $blogpost->addMedia($mediaPath) // Add the file to the blogpost
            ->preservingOriginal()      // Create a copy of the file in the media library
            ->toMediaLibrary();         // Copy the file to the configured disk

        $this->info("Added {$mediaPath} to the blogpost!");

        $media = $blogpost->getMedia()->last();
        $this->line("Medialibrary has automatically copied the file to the media disk ({$media->getPath()})");
    }
}
