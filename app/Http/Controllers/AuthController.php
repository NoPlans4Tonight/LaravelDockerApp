<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request) {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return response()->json(['status' => 1, 'message' => 'Login Successful.']);
        }
        else {
            return response()->json(['status' => 0, 'message' => 'Login failed.']);
        }
    }

    public function logout(){
        Auth::logout();
        return response()->json(['status' => 1, 'message' => 'Logout successful.']);
    }
}
