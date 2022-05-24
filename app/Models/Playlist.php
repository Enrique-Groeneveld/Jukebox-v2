<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Playlist extends Model
{
    protected $fillable = [
        'name', 'user_id',
    ];

    use HasFactory;
    public function song()
    {
        return $this->belongsToMany(Song::class);
    }

    public function user()
    {
        return $this->belongsToMany(User::class);
    }
}
