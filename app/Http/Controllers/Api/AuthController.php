<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $user = User::create([

            'name' => $request->name,

            'email' => $request->email,

            'password' => Hash::make($request->password),

            'role' => 'customer'

        ]);

        return response()->json([

            'success' => true,

            'message' => 'Register berhasil',

            'data' => $user

        ]);
    }

    public function login(Request $request)
    {
        $user = User::where(
            'email',
            $request->email
        )->first();

        if (!$user) {

            return response()->json([

                'success' => false,

                'message' => 'Email tidak ditemukan'

            ]);
        }

        if (!Hash::check(
            $request->password,
            $user->password
        )) {

            return response()->json([

                'success' => false,

                'message' => 'Password salah'

            ]);
        }

        return response()->json([

            'success' => true,

            'message' => 'Login berhasil',

            'data' => $user

        ]);
    }
}