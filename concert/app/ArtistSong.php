<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArtistSong extends Model
{
    protected $fillable = [
        'artist_id', 'song_id',
    ];

    public function song()
    {
        return $this->belongsTo('App\Song');
    }

    public function artist()
    {
        return $this->belongsTo('App\Artist');
    }

    public function list()
    {
        return ArtistSong::select('artist_id', 'song_id')
                    ->get();
    }

    public function forID($artist_id, $song_id)
    {
        return ArtistSong::select('artist_id', 'song_id')
                    ->where('artist_id', $artist_id)
                    ->where('song_id', $song_id)
                    ->first();
    }
}
