<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\UserService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    public function store(Request $request){
        $dataRegister = $request->all();
        foreach($dataRegister as $data => $dataKey){
            if(empty($dataKey)){
                return response()->json([
                    'status' => false,
                    'errorMsg' => "Algum dos Campos para Registro, não foram preenchidos."
                ]);
            }
        }
        
        return UserService::registerUser($dataRegister['name'], $dataRegister['email'], $dataRegister['password']);
    }

    public function login(Request $request){

        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'device_name' => 'required',
        ]);
     
        $user = User::where('email', $request->email)->first();
     
        if (! $user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['Credenciais Incorretas.'],
            ]);
        }
        $token = $user->createToken($request->device_name)->plainTextToken;
        return response()->json(['token' => $token,
                                 'user' => $user]);
    }

    public function logout(Request $request)
    {
            $request->user()->currentAccessToken()->delete();
            $msg = "Deslogado com Sucesso!";

            return response()->json(['message', $msg]);
    }

}

