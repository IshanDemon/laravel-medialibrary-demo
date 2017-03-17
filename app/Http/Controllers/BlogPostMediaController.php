<?php

namespace App\Http\Controllers;

use App\BlogPost;
use Illuminate\Http\Request;

class BlogPostMediaController extends Controller
{
    /** @var  BlogPost  The only blogpost we're using in the DB */
    protected $blogpost;

    public function __construct()
    {
        $this->blogpost = BlogPost::first();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->blogpost
            ->addMedia($request->file)
            ->toMediaLibrary();

        return redirect()->back()->with('status', 'Media files added to blogpost!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $mediaId
     * @return \Illuminate\Http\Response
     */
    public function destroy($mediaId)
    {
        $this->blogpost
            ->getMedia()
            ->keyBy('id')
            ->get($mediaId)
            ->delete();

        return redirect()->back()->with('status', 'Media file deleted!');
    }

    public function destroyAll()
    {
        $this->blogpost->clearMediaCollection();

        return redirect()->back()->with('status', 'All media deleted!');
    }
}
