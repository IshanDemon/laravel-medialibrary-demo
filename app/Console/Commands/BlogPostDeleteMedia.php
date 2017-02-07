<?php

namespace App\Console\Commands;

use App\BlogPost;
use Illuminate\Console\Command;

class BlogPostDeleteMedia extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'blogpost:deletemedia {id?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Deletes one or all media files associated with the blogpost.';

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
        $blogpost = BlogPost::find(1);

        if ($this->argument('id')) {
            // Find the correct Media item and delete it
            $blogpost
                ->getMedia()
                ->keyBy('id')
                ->get($this->argument('id'))
                ->delete();

            $this->info('Deleted 1 media item associated with the BlogPost.');

            $this->call('blogpost:listmedia');
        }

        if (empty($this->argument('id'))) {
            // Deletes all associated media files from the BlogPost
            $blogpost->clearMediaCollection();

            $this->info('Deleted all media associated with the BlogPost.');
        }
    }
}
