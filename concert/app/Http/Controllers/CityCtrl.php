<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\City;

class CityCtrl extends Controller
{
    public function create(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
        ]);

        City::create([
            'name' => $request->name,
        ]);

        return redirect('city');
    }

    public function update(Request $request)
    {
        $city = City::forID($request->id);
        $city->name = $request->name;
        $city->save();
        
        return redirect('city');
    }

    public function delete(Request $request)
    {
        $city = city::forID($request->id);
        $city->delete();

        return redirect('city');
    }

    public function list()
    {
        return City::list();
    }

    public function forID(Request $request)
    {
        return City::forID($request->id);
    }
}
