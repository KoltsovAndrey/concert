<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Choise extends Model
{
    protected $fillable = [
        'user_id', 'concert_id', 'song_id', 'date', 
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function song()
    {
        return $this->belongsTo('App\Song');
    }

    public function concert()
    {
        return $this->belongsTo('App\Concert');
    }

    public function list()
    {
        return Choises::select('id', 'user_id', 'concert_id', 'song_id', 'date')
                    ->get();
    }

    public function forID($id)
    {
        return Choise::select('id', 'user_id', 'concert_id', 'song_id', 'date')
                    ->where('id', $id)
                    ->first();
    }
}
