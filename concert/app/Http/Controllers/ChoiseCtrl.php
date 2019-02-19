<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Choise;

class ChoiseCtrl extends Controller
{
    public function create(Request $request)
    {
        $this->validate($request, [
            'user_id' => 'required',
            'concert_id' => 'required',
            'song_id' => 'required',
            'date' => 'required',
        ]);

        $choise = Choise::create([
            'user_id' => $request->user_id,
            'concert_id' => $request->concert_id,
            'song_id' => $request->song_id,
            'date' => $request->date,
        ]);

        return redirect();
    }

    public function update(Request $request)
    {
        $choise = Choise::forID($request->id);
        $choise->user_id = $request->user_id;
        $choise->concert_id = $request->concert_id;
        $choise->song_id = $request->song_id;
        $choise->date = $request->date;
        $choise->save();
        
        return redirect();
    }

    public function delete(Request $request)
    {
        $choise = Choise::forID($request->id);
        $choise->delete();

        return redirect();
    }

    public function list()
    {
        return Choise::list();
    }

    public function forID(Request $request)
    {
        return Choise::forID($request->id);
    }
}
