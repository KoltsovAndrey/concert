<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\ArtistSong;

class ArtistSongCtrl extends Controller
{
    public function create(Request $request)
    {
        $this->validate($request, [
            'artist_id' => 'required',
            'song_id' => 'required',
        ]);

        $artistSong = ArtistSong::create([
            'artist_id' => $request->artist_id,
            'song_id' => $request->song_id,
        ]);

        return redirect('artistsong');
    }

    public function update(Request $request)
    {
        $artistSong = ArtistSong::forID($request->artist_id, $request->song_id);
        $artistSong->artist_id = $request->artist_id;
        $artistSong->song_id = $request->song_id;
        $artistSong->save();
        
        return redirect('artistsong');
    }

    public function delete(Request $request)
    {
        $artistSong = ArtistSong::forID($request->artist_id, $request->song_id);
        $artistSong->delete();

        return redirect('artistsong');
    }

    public function list()
    {
        return ArtistSong::list();
    }

    public function forID(Request $request)
    {
        return ArtistSong::forID($request->artist_id, $request->song_id);
    }
}
