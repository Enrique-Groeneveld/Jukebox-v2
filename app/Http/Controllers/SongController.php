<?php

namespace App\Http\Controllers;

use App\Models\Song;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
class SongController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $data = array();
        $songs = Song::get();
        foreach($songs as $song) {
            $song['Artist'] = $song->artist;
            $song['Genre'] = $song->genre;
            // $song['Playlists'] = $song->playlist;
        }
        return JSON_encode($songs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = auth()->user();
        return Playlist::create([
            'name' => request('name'),
            'user_id' => $user['id']
        ]);
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
        $songData = array();
        // dd($song);
        // $playlist = $song->playlist;
        $songData = $song;
        $songData['Artists'] = $song->artist;
        $songData['Genre'] = $song->genre;
        $songData['Playlists'] = $song->playlist;
        // dd($song->playlist);
        return $songData;
    }

    public function showall()
    {
        $data = array();
        $songs = Song::get();
        foreach($songs as $song) {
            $song['Artist'] = $song->artist;
            $song['Genre'] = $song->genre;
            $song['Playlists'] = $song->playlist;
        }
        return $songs;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Song  $song
     * @return \Illuminate\Http\Response
     */
    public function edit(Song $song)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Song  $song
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Song $song)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Song  $song
     * @return \Illuminate\Http\Response
     */
    public function destroy(Song $song)
    {
        //
    }
}
