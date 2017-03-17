<?php

namespace App\Http\Controllers;

use App\PhotoAlbum;
use Illuminate\Http\Request;

class PhotoAlbumMediaController extends Controller
{
    /** @var  BlogPost  The only photoalbum we're using in the DB */
    protected $photoalbum;

    public function __construct()
    {
        $this->photoalbum = PhotoAlbum::first();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->photoalbum
            ->addMedia($request->file)
            ->toMediaLibrary();

        return redirect()->back()->with('status', 'Media files added to photo album!');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $mediaId
     * @return \Illuminate\Http\Response
     */
    public function destroy($mediaId)
    {
        $this->photoalbum
            ->getMedia()
            ->keyBy('id')
            ->get($mediaId)
            ->delete();

        return redirect()->back()->with('status', 'Media file deleted!');
    }

    public function destroyAll()
    {
        $this->photoalbum->clearMediaCollection();

        return redirect()->back()->with('status', 'All media deleted!');
    }
}
