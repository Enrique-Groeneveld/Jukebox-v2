<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'user_id',
    ];
    public function song()
    {
        return $this->hasMany(Song::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
