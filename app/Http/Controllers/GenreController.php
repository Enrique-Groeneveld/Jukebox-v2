<?php

namespace App\Http\Controllers;
use App\Models\Genre;

use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function index()
    {
        return Genre::get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


        // return Song::create([
        //     'name' => request('name'),
        //     'duration' => request('duration'),
        //     'user_id' => $user['id']
        // ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Song  $song
     * @return \Illuminate\Http\Response
     */
    public function show(Song $song)
    {
        // $songData = array();
        // dd($song);
        // $playlist = $song->playlist;
        // $songData = $song;
        // $songData['Artists'] = $song->artist;
        // $songData['Genre'] = $song->genre;
        // $songData['Playlists'] = $song->playlist;
        // dd($song->playlist);
        // return $songData;
    }
}
