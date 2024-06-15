<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\UserService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
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
        
    $userService = new UserService();

        return $userService->registerUser($dataRegister['name'], $dataRegister['email'], $dataRegister['password']);
    }

    public function login(Request $request){

        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'device_name' => 'required',
        ]);
     
        $login = $request->all();
        
        $userService = new UserService();

        return $userService->loginUser($login['email'], $login['password'], $login['device_name']);
    }

    public function logout(Request $request)
    {
            $request->user()->currentAccessToken()->delete();
            $msg = "Deslogado com Sucesso!";

            return response()->json(['message', $msg]);
    }

    public function getAllUsers(){
        $queryAllUsers = DB::table('users')->get();

        return response()->json(['allClients' => $queryAllUsers]);
    }

}

