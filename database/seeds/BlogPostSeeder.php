<?php

use Illuminate\Database\Seeder;

class BlogPostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('blog_posts')->delete();
        DB::table('blog_posts')->insert([
            'title' => 'Example Blogpost',
            'content' => 'This is the blogpost\'s content!<br/>It\'s a pretty bad blogpost.',
        ]);
    }
}
