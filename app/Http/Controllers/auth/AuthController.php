<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AuthRequest;

use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

use App\Models\User;
use App\Models\Role;

class AuthController extends Controller
{
    public function login(AuthRequest $request) {

        $request->validated();

        $user = User::with('roles')->where('email', $request->email)->first();
        $tokenpermission = array();
        foreach($user->roles as $role) {
            $permissions = Role::with('permissions')->find($role->id);
            if ($permissions->name == 'Administrador') {
                array_push($tokenpermission, '*');
                break;
            } else {
                foreach($permissions->permissions as $permission) {
                    array_push($tokenpermission, $permission->name);
                }     
            }
        }

        if (! $user or ! Hash::check($request->password, $user->password))  {
            return response()
            ->json(['message' => 'Email ou senhas incorretos!'], 403)
            ->setEncodingOptions(JSON_UNESCAPED_SLASHES)
            ->header('Content-Type', 'application/json');
        }

        $user->tokens()->delete();

        $token = $user->createToken($request->email . strtotime('now'), $tokenpermission)->plainTextToken;

        return response()
            ->json([
                'acess_token' => $token,
                'login' => $request->email,
                'permissions' => $tokenpermission,
                'token_type' => 'baerer'], 202)
            ->setEncodingOptions(JSON_UNESCAPED_SLASHES)
            ->header('Content-Type', 'application/json');

    } 

    public function revoke(Request $request) {

        if ($request->user()->currentAccessToken()->delete()) {
            return response()
                ->json([
                    'message' => 'logged out.'
                ], 200);
        } else {
            return response()
                ->json([
                    'message' => 'internal error'
                ], 500); 
        }
    }

    public function tokenme(Request $request) {

        if($request->user()->tokenCan('computadores_cadastra')) {
            $token = $request->user()->currentAccessToken()->toArray();
            return response()->json(
                $token,
                200
            );
        } else {
            return response()->json(
                ['message' => 'Unauthorized'],
                403
            );
        }

    }

}
