<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'password' => 'required',
            'confirm_password' => 'required|same:password'
        ]);

        if($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => "Ada Kesalahan",
                'data' => $validator->errors()
            ], 400);
        }

        $input= $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);

        // membuat success dengan index array token
        $success['token'] = $user->createToken('auth_token')->plainTextToken;
        $success['name'] = $user->name;

        return response()->json([
            'success' => true,
            'message' => 'Sukses register',
            'data' => $success
        ]);

    }

    public function login(Request $request)
    {
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $auth = Auth::user();
            $success['token'] = $auth->createToken('auth_token')->plainTextToken;
            $success['name'] = $auth->name;

            return response()->json([
                'success' => true,
                'message' => 'Login sukses',
                'data' => $success
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Cek email dan password lagi!',
                'data' => null
            ]);
        }
    }
}
