<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

use App\Models\{User};

class AuthController extends Controller
{
    public function login(Request $request) {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = User::where('email', $request->email)->first();

        if (! $user)  {
            return response()
            ->json(['message' => 'E-mail incorreto!'], 403)
            ->setEncodingOptions(JSON_UNESCAPED_SLASHES)
            ->header('Content-Type', 'application/json');
        }

        if (! Hash::check($request->password, $user->password)) {
            return response()
            ->json(['message' => 'Senha incorreto!'], 403)
            ->setEncodingOptions(JSON_UNESCAPED_SLASHES)
            ->header('Content-Type', 'application/json');
        }

        $token = $user->createToken($request->email . strtotime('now'))->plainTextToken;

        return response()
            ->json([
                'acess_token' => $token,
                'token_type' => 'baerer'], 202)
            ->setEncodingOptions(JSON_UNESCAPED_SLASHES)
            ->header('Content-Type', 'application/json');

    } 

}
