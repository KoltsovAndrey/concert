<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Concert;

class ConcertCtrl extends Controller
{
    public function create(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'cost' => 'required',
            'count' => 'required',
            'artist_id' => 'required',
            'place_id' => 'required',
        ]);

        $concert = Concert::create([
            'name' => $request->name,
            'cost' => $request->cost,
            'count' => $request->count,
            'artist_id' => $request->artist_id,
            'place_id' => $request->place_id,
        ]);

        return redirect();
    }

    public function update(Request $request)
    {
        $concert = Concert::forID($request->id);
        $concert->name = $request->name;
        $concert->cost = $request->cost;
        $concert->count = $request->count;
        $concert->place_id = $request->place_id;
        $concert->artist_id = $request->artist_id;
        $concert->save();
        
        return redirect();
    }

    public function delete(Request $request)
    {
        $concert = Concert::forID($request->id);
        $concert->delete();

        return redirect();
    }

    public function list()
    {
        return Concert::list();
    }

    public function forID(Request $request)
    {
        return Concert::forID($request->id);
    }
}
