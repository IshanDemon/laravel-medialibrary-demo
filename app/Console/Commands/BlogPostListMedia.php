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
    protected $signature = 'blogpost:list-media';

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
                return [
                    $media->id,
                    $media->name,
                    $media->mime_type,
                    $media->human_readable_size,
                    $media->getPath()
                ];
            });

        if ($mediaTable->count() == 0) {
            return $this->comment("You haven't added any media files yet.");
        }

        $headers = ['id', 'name', 'type', 'size', 'path'];

        $this->table($headers, $mediaTable->toArray());
    }
}
