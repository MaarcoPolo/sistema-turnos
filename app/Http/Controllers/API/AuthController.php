<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        // Verificamos si un usuario esta eliminado (inactivo)
        $user_inactivo = User::where('username', $request->usuario)->where('password', $request->password)->where('status', 0)->exists();
        if ($user_inactivo) {
            $response = [
                'status' => 'error',
                'success' => false,
                'message' => 'Usuario eliminado'
            ];

            return response()->json($response);
        }

        $user = User::where('username', $request->usuario)->where('password', $request->password)->where('status', 1)->first();

        // if (Auth::attempt(['username' => $request->usuario, 'password' => $request->password])) {
        if ($user) {
            $token = $user->createToken('my-app-token')->plainTextToken;

            $response = [
                'user' => $user,
                'token' => $token,
            ];

            return response()->json([
                "status" => "ok",
                "message" => "Usuario logueado con exito",
                "session" => $response
            ], 200);
        } else {
            $response = [
                'status' => 'error',
                'success' => false,
                'message' => 'Usuario y/o contraseña invalidos'
            ];

            return response()->json($response);
        }
    }
}
