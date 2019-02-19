<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Artist;

class ArtistCtrl extends Controller
{
    public function create(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
        ]);

        $artist = Artist::create([
            'name' => $request->name,
        ]);

        return redirect();
    }

    public function update(Request $request)
    {
        $artist = Artist::forID($request->id);
        $artist->name = $request->name;
        $artist->save();
        
        return redirect();
    }

    public function delete(Request $request)
    {
        $artist = Artist::forID($request->id);
        $artist->delete();

        return redirect();
    }

    public function list()
    {
        return Artist::list();
    }

    public function forID(Request $request)
    {
        return Artist::forID($request->id);
    }
}
