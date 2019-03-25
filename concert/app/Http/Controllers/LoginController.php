<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class LoginController extends Controller
{
    public function login(Request $request) {
        $user = User::where([['email', $request->email], ['password', $request->password]])
            ->first();
        // dd(Hash::make('123456'));
        
        if (!$user) {
            return getJson(null, ['message'=>'Данного юзера не существует']);
        }
        return getJson($user);
    }
}
