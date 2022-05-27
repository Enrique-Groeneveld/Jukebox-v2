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
    public function create()
    {
        $user = auth()->user();
        return Genre::create([
            'name' => request('name'),
        ]);
    }

    public function edit(Genre $genre){
        $user = auth()->user();

            return $genre->update([
                'name' => request('name'),
            ]);
    }

    public function delete(Genre $genre)
    {
        $user = auth()->user();
        $song = $genre->song;
        if($genre['id'] == 1){

        abort(404, 'Cant delete genre 1');
        }
        else {
            foreach ($song as $single){
                $single->update([
                    'genre_id' => 1,
                ]);
                }
            return $genre->delete();
        }

    }
}
