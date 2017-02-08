<?php

namespace App\Console\Commands;

use App\Article;
use Illuminate\Console\Command;

class ArticleAddMedia extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'article:addmedia {path}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Adds a media file to the article.';

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
        $path = $this->argument('path');

        $this->validatePath($path);

        $article = Article::find(1);

        $article->addMedia($path)           // Add the file to the photoAlbum
            ->preservingOriginal()          // Create a copy of the file in the media library
            ->toMediaLibrary('downloads');  // Copy the file to the configured disk and add it to the downloads collection

        $this->info(PHP_EOL."Added {$path} to the Article!");

        $media = $article->getMedia('downloads')->last();

        $this->comment('Medialibrary has automatically copied the file to the media disk:');
        $this->line($media->getPath().PHP_EOL);

        $this->comment('The following conversions have been generated:');
        $this->line($media->getPath('thumbnail').PHP_EOL);
    }

    protected function validatePath($path)
    {
        if (! file_exists($path)) {
            throw new \InvalidArgumentException('The file you provided doesn\'t exist. Try using demofiles/coolvideo.webm as the path');
        }
    }
}
