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

        Song::create([
            'name' => $request->name,
        ]);

        return redirect('song');
    }

    public function update(Request $request)
    {
        $song = Song::forID($request->id);
        $song->name = $request->name;
        $song->save();
        
        return redirect('song');
    }

    public function delete(Request $request)
    {
        $song = Song::forID($request->id);
        $song->delete();

        return redirect('song');
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
