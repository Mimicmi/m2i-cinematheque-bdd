<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        $userCredentials = request(['email', 'password']);
        if (!Auth::attempt($userCredentials)) {
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);
        }
        return response()->json(['message' => 'Authorized'], 201);
    }
}
