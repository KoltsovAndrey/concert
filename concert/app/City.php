<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable = [
        'name',
    ];

    public function place()
    {
        return $this->hasMany('App\Place');
    }

    //sql
    public function list()
    {
        return City::select('id', 'name')
                    ->get();
    }

    public function forID($id)
    {
        return City::select('id', 'name')
                    ->where('id', $id)
                    ->first();
    }
}
