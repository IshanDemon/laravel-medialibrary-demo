<?php

namespace App\Console\Commands;

use App\BlogPost;
use Illuminate\Console\Command;

class BlogPostUpdateMedia extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'blogpost:updatemedia {id} {--name=} {--filename=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Updates the name and optionally the filename of the media entry';

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
        $media = BlogPost::find(1)
            ->getMedia()
            ->get($this->argument('id'));

        if (! $media) {
            return $this->error('Couldn\'t find media file with that ID.');
        }

        if ($this->option('name')) {
            // Update the media file's name.
            $media->name = $this->option('name');
        }

        if ($this->option('filename')) {
            // Update the media's filename. The file on the filesystem will be renamed as well.
            $media->file_name = $this->option('filename');
        }

        // Save the Media like you're used to in Eloquent models
        $media->save();

        $this->info("Media updated: {$media->name} ({$media->getPath()})");

        $this->call('blogpost:listmedia');
    }
}
