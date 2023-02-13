<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request) {
        $user = User::where('email', $request->email)->first();
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'message' => 'The provided credentials are incorrect.'
            ], 401);
        }
        $token = $user->createToken('token')->plainTextToken;
        $roles = $user->userRoles->pluck('role_id');
        return response()->json([
            'token' => $token,
            'roles' => $roles
        ]);
    }
    
}
