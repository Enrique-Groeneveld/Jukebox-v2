<?php

namespace App\Http\Controllers;

use App\Models\Playlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Songcontroller;
use App\Http\Controllers\API\Registercontroller;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\User;
use App\Models\Song;
use Illuminate\Support\Facades\Auth;
use Validator;
use Laravel\Passport\HasApiTokens;

// namespace App\Http\Controllers\API;

// use Illuminate\Http\Request;

class PlaylistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = auth()->user();
        $playlist = DB::table('playlists')
        ->where('user_id', '=', $user['id'])
        ->get();
        return $playlist;
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
     * @param  \App\Models\Playlist  $playlist
     * @return \Illuminate\Http\Response
     */
    public function show(Playlist $playlist)
    {
        $user = auth()->user();
        if ($playlist['user_id'] == $user['id']){
            $songs = $playlist->song;
            foreach ($songs as $song){
                $song['artist'] = $song->artist;
                $song['genre'] = $song->genre;
                if ($song['duration'] <= '01:00:00'){
                    $song['duration'] = date("i:s", strtotime( $song['duration']));
                }
            }
            // $playlist['songs'] = $songs;
            return $playlist;
        }
        else {
            abort(404, 'invalid id or playlist doesnt belong to user');
        }
    }

    public function insertinto(Playlist $playlist)
    {
        // $song = Song::where('id',request('songId'));
        $result = false;
        $songs = $playlist->song;
        foreach ($songs as $song){
            if($song['id'] == request('songId')){
                $result = true;
            }
        }
        if ($result){
            abort(404, 'already exists');
        }
        else{
            $song = Song::find(request('songId'));
            return $playlist->song()->attach($song);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Playlist  $playlist
     * @return \Illuminate\Http\Response
     */
    public function edit(Playlist $playlist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Playlist  $playlist
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Playlist $playlist)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Playlist  $playlist
     * @return \Illuminate\Http\Response
     */
    public function destroyRow(Playlist $playlist, $id)
    {
        $song = Song::where('id',$id)->first();
        return $playlist->song()->detach($song);
    }

    public function destroy(Playlist $playlist)
    {
        $playlist->song()->detach();
        return $playlist->delete();
    }
}
