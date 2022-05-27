<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'duration', 'artist_id', 'genre_id'
    ];
    /**
     * The roles that belong to the Song
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function playlist()
    {
        return $this->belongsToMany(Playlist::class);
    }

    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }

    public function artist()
    {
        return $this->belongsTo(Artist::class);
    }
}
