<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    protected $fillable = [
        'name',
    ];

    public function choise()
    {
        return $this->hasMany('App\Choise');
    }

    public function artistSong()
    {
        return $this->hasMany('App\ArtiistSong');
    }

    //sql
    public function list()
    {
        return Song::select('id', 'name')
                    ->get();
    }

    public function forID($id)
    {
        return Song::select('id', 'name')
                    ->where('id', $id)
                    ->first();
    }
}
