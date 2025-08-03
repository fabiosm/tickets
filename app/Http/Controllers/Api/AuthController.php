<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
           'email' => 'required|string|email',
           'password' => 'required|string',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
               'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        // Cria token de acesso
        $token = $user->createToken('api-token')->plainTextToken;

        return response()->json([
           'user' => $user,
           'token' => $token,
        ]);
    }
}
