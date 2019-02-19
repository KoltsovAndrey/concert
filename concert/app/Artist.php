<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    protected $fillable = [
        'name',
    ];

    public function concert()
    {
        return $this->hasMany('App\Concert');
    }

    public function artistSong()
    {
        return $this->hasMany('App\ArtistSong');
    }

    public function list()
    {
        return Artist::select('id', 'name')
                    ->get();
    }

    public function forID($id)
    {
        return Artist::select('id', 'name')
                    ->where('id', $id)
                    ->first();
    }
}
