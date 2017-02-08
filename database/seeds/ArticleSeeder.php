<?php

use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('articles')->delete();
        DB::table('articles')->insert([
            'title' => 'Example Article',
            'content' => 'This is the article\'s content!<br/>It should feature some downloads with automatically generated thumbnails.',
        ]);
    }
}
