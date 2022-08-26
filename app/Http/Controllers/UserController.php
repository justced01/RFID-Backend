<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Carbon\Carbon;

class UserController extends Controller
{
    # DOCU: This function will send json data containing user information 
    public function show(Request $request){
        return response()->json([
            'status' => 200,
            'message' => 'User data successfully retrieved!',
            'data' => User::where('id', $request->user()->id)->first()
        ]);
    }

    # DOCU: This function will check and authenticate the user credentials in the database if exist.
    public function login(Request $request){
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string'
        ]);
        
        $credentials = request(['email', 'password']);

        if(!Auth::attempt($credentials)){
            return response()->json([
                'status' => 301,
                'message' => 'Login unauthorized! Email or password incorrect!'
            ]);
        }

        $user = $request->user();
        $tokenResult = auth()->user()->createToken('LaravelAuthApp');
        $token = $tokenResult->token;

        $user_data = User::where('email', $request->email)->first();

        if($user_data->role === 1){
            return response()->json([
                'status' => 200,
                'message' => 'Welcome Super Admin user!',
                'redirect' => '/admin/dashboard',
                'access_token' => $tokenResult->accessToken,
                'token_type' => 'Bearer',
                'expires_at' => Carbon::parse($tokenResult->token->expires_at)->toDateTimeString(),
            ]);
        } elseif ($user_data->role === 2){
            return response()->json([
                'status' => 200,
                'message' => 'Welcome Admin user!',
                'redirect' => '/admin/dashboard',
                'access_token' => $tokenResult->accessToken,
                'token_type' => 'Bearer',
                'expires_at' => Carbon::parse($tokenResult->token->expires_at)->toDateTimeString(),
            ]);
        } elseif ($user_data->role === 3){
            return response()->json([
                'status' => 200,
                'message' => 'Welcome user!',
                'redirect' => '/user/dashboard',
                'access_token' => $tokenResult->accessToken,
                'token_type' => 'Bearer',
                'expires_at' => Carbon::parse($tokenResult->token->expires_at)->toDateTimeString(),
            ]);
        }
    }

    # DOCU: This function will store the user input data from registration form
    public function create(Request $request){
        $request->validate([
            'first_name' => 'required|string|min:3',
            'middle_name' => 'required|string|min:3',
            'last_name' => 'required|string|min:3',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|confirmed'
        ]);

        User::create([
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => bcrypt($request->input('password'))
        ]);

        return response()->json([
            'status' => 200,
            'message' => 'Account successfully created!',
            'redirect' => '/api/users/new'
        ]);
    }

    # DOCU: This function will logout and destroy the Session
    # Not yet functional
    public function logout(){
        Session::flush();
        Auth::logout();

        return response()->json([
            'status' => 200,
            'message' => 'Account successfully logout!',
            'redirect' => '/api/users'
        ]);
    }
}
