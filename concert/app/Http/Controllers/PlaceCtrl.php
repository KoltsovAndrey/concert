<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Place;

class PlaceCtrl extends Controller
{
    public function create(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'city_id' => 'required',
        ]);

        $place = Place::create([
            'name' => $request->name,
            'city_id' => $request->city_id,
        ]);

        return redirect();
    }

    public function update(Request $request)
    {
        $place = Place::forID($request->id);
        $place->name = $request->name;
        $place->city_id = $request->city_id;
        $place->save();
        
        return redirect();
    }

    public function delete(Request $request)
    {
        $place = Place::forID($request->id);
        $place->delete();

        return redirect();
    }

    public function list()
    {
        return Place::list();
    }

    public function forID(Request $request)
    {
        return Place::forID($request->id);
    }
}
