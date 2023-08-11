<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        try {
            $this->validate($request, [
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255|unique:users',
                'password' => 'required|string|min:5',
            ]);

            $user = new User([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            if ($user->save()) {
                event(new Registered($user));

                return response()->json(['status' => 1, 'message' => 'Successfully registered.']);
            } else {
                return response()->json(['status' => 0, 'message' => 'Registration failed.']);
            }
        } catch (ValidationException $e) {
            return response()->json(['status' => 0, 'message' => 'Validation error.', 'errors' => $e->errors()], 422);
        }
    }
}
