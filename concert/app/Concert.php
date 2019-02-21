<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Concert extends Model
{
    protected $fillable = [
        'name', 'cost', 'count', 'place_id', 'artist_id', 
    ];

    public function place()
    {
        return $this->belongsTo('App\Place');
    }

    public function artist()
    {
        return $this->belongsTo('App\Artist');
    }

    public function choise()
    {
        return $this->hasMany('App\Choise');
    }

    public static function list()
    {
        return Concert::select('id', 'name', 'cost', 'count', 'place_id', 'artist_id')
                    ->get();
    }

    public static function forID($id)
    {
        return Concert::select('id', 'name', 'cost', 'count', 'place_id', 'artist_id')
                    ->where('id', $id)
                    ->first();
    }
}
