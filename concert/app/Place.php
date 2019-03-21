<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    protected $fillable = [
        'name', 'city_id',
    ];

    public function city()
    {
        return $this->belongsTo('App\City');
    }

    public function concert()
    {
        return $this->hasMany('App\Concert');
    }

    public static function list()
    {
        return Place::select('id', 'name', 'city_id')
                    ->get();
    }

    public static function forID($id)
    {
        return Place::select('id', 'name', 'city_id')
                    ->where('id', $id)
                    ->first();
    }
}
