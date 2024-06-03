<?php

namespace App\Http\Controllers;

use App\Models\Usuarios as ModelsUsuarios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Usuarios extends Controller
{
    public function create(Request $request){
        
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:100',
            'email' => 'required|email',
            'telephone' => 'required|string|max:9',
        ]);

        if($validator->fails()){
            return response()->json([
                'status' => false,
                'message' => 'Validator Error!',
                'data' => $validator->errors()
            ], 409);
        }

        $usuariosTable = ModelsUsuarios::where('email', $request->email)->first();
        if($usuariosTable){
            return response()->json([
                'status' => false,
                'message' => 'User already exists!',
                'data' => 'Not Data'
            ], 409);
        }

        $user = new ModelsUsuarios();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->telephone = $request->telephone;
        $user->save();

        return response()->json([
            'status' => true,
            'message' => 'New user created',
            'data' => $user
        ],201);
    }

    public function usuarios(){
        $users = ModelsUsuarios::get();

        if(!$users){
            return response()->json([
                'status' => false,
                'message' => 'No users found!',
                'data' => 'Not Data'
            ], 409);
        }

        return response()->json([
            'status' => true,
            'message' => 'Get all users!',
            'data' => $users
        ],200);
    }

    public function usuariosNameStartWithR(){
        $users = ModelsUsuarios::where('name', 'R%')->get();

        if(!$users){
            return response()->json([
                'status' => false,
                'message' => 'No users how name starts with R!',
                'data' => 'Not Data'
            ], 409);
        }

        return response()->json([
            'status' => true,
            'message' => 'Get all users that name starts with R!',
            'data' => $users
        ],200);
    }
}
