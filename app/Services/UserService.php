<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserService
{

    public function registerUser($name, $email, $password)
    {
        User::create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password)
        ]);

        return response()->json([
            'status' => true,
            'message' => "Usuário Registrado com Sucesso!."
        ]);
    }

    public function loginUser($email, $password)
    {
        $credentials = [
            'email' => $email,
            'password' => $password
        ];

       

        if (Auth::attempt($credentials)) {
            $auth = Auth::user();
            $success = true;
            $message = "Usuário Logado com Sucesso";
        } else {
            $success = false;
            $message = "Não Autorizado";
        }

        $response = [
            'auth' => $auth,
            'success' => $success,
            'message' => $message
        ];

        return response()->json($response);
    }
}
