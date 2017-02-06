<?php

namespace App\Console\Commands;

use App\BlogPost;
use Illuminate\Console\Command;
use Spatie\MediaLibrary\Media;

class BlogPostListMedia extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'blogpost:listmedia';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Lists all media associated to the blogpost.';

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
        $mediaTable = BlogPost::find(1)
            ->getMedia()
            ->map(function (Media $media) {
                $media->path = $media->getPath();
                $media = collect($media);
                return $media->only(['id', 'name', 'mime_type', 'path']);
            });

        if ($mediaTable->count() == 0) {
            return $this->error('You haven\'t added any media files yet.');
        }

        $headers = ['Id', 'Name', 'Type', 'Path'];

        $this->table($headers, $mediaTable->toArray());
    }
}
