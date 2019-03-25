<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class RegisterController extends Controller
{
    public function signup(Request $request) {
        $user = User::create($request->input());

        return getJson($user);
    }
}
