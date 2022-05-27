<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use App\Models\Song;
use App\Models\Playlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArtistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = array();
        $artist = Artist::get();
        return $artist;
    }

    public function user(Artist $artist)
    {
        $artist['user'] = $artist->user;
        // var_dump($artist['user']);
        // die();
    //    $artist['user'] =
        // $data = array();

        return $artist;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  \App\Models\Artist  $artist
     * @return \Illuminate\Http\Response
     */
    public function show(Artist $artist)
    {
        $artist['song'] = $artist->song;
        foreach ($artist['song'] as $song){
            $song['artist'] = $song->artist;
            $song['genre'] = $song->genre;
            if ($song['duration'] <= '01:00:00'){
                $song['duration'] = date("i:s", strtotime( $song['duration']));
            }
        }
        // $playlist['songs'] = $songs;
        return $artist;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Artist  $artist
     * @return \Illuminate\Http\Response
     */
    public function link()
    {
        $user = auth()->user();
        if(!$user['artist']){
             Artist::create([
            'name' => request('name'),
            'user_id' => $user['id']
        ]);
            return Artist::create([
                'name' => request('name'),
                'user_id' => $user['id']
            ]);
        }
        else{
            abort(404, 'This user already has a artist');
        }

    }
    public function edit(Artist $artist){
        $user = auth()->user();
        if ($artist['user_id'] == $user['id']){
            return $artist->update([
                'name' => request('name'),
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
     * @param  \App\Models\Artist  $artist
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Artist $artist)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Artist  $artist
     * @return \Illuminate\Http\Response
     */
    public function delete(Artist $artist)
    {
        $user = auth()->user();
         $song = $artist->song;


        // die();
        $user->artist;
        if ($artist['user_id'] == $user['id']){
            foreach ($song as $single){
                // $single->playlist()->detach($single);
                $single->playlist()->detach();
                $single->delete();
             }
            // $song->playlist()->detach();
            return $artist->delete();
        }
        else {
            abort(404, 'invalid id or artist doesnt belong to user');
        }
    }
}
