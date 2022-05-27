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
            $song->artist;
            $song->genre;
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
        $artist = $user->artist;

        $test = Song::create([
            'name' => request('name'),
            'duration' => request('duration'),
            'artist_id' => $artist['id'],
            'genre_id' => request('genre')
        ]);


        return  Song::create([
            'name' => request('name'),
            'duration' => request('duration'),
            'artist_id' => $artist['id'],
            'genre_id' => request('genre')
        ]);// user may have input field name

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
        $songData = array();
        // dd($song);
        // $playlist = $song->playlist;
        $songData = $song;
         $song->artist;
         $song->genre;
         $song->playlist;
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
        $user = auth()->user();
        $user->artist;
        if ($song['artist_id'] == $user['artist']['id']){
            return $song->update([
                'name' => request('name'),
                'duration' => request('duration'),
                'genre_id' => request('genre'),
            ]);
        }
        else {
            abort(404, 'invalid id or playlist doesnt belong to user');
        }
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
        $user = auth()->user();
        $user->artist;
        if ($song['artist_id'] == $user['artist']['id']){
            $song->playlist()->detach();
            return $song->delete();
        }
        else {
            abort(404, 'invalid id or song doesnt belong to artist');
        }
    }
}
