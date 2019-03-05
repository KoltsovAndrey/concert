<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Song;

class SongCtrl extends Controller
{
    public function create(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
        ]);

        $song = Song::create([
            'name' => $request->name,
        ]);

        return $song;
    }

    public function update(Request $request)
    {
        $song = Song::forID($request->id);
        $song->name = $request->name;
        $song->save();
        
        return $song;
    }

    public function delete(Request $request)
    {
        $song = Song::forID($request->id);
        $song->delete();

        return ['status' => true];
    }

    public function list()
    {
        return Song::list();
    }

    public function forID(Request $request)
    {
        return Song::forID($request->id);
    }
}
