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

    public function loginUser($email, $password, $device)
    {
       
        $user = User::where('email', $email)->first();
     
        if (!$user || !Hash::check($password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['Credenciais Incorretas.'],
            ]);
        }
        $token = $user->createToken($device)->plainTextToken;
        return response()->json(['token' => $token,
                                 'user' => $user]);
    }
}
