<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
{
    public function __construct(){
        $this->middleware('auth', ['except' => ['index']]);
    }
    
    # DOCU: This function will render the login page.
    public function index(){
        return view('users.login');
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
                'status' => 400,
                'message' => 'Login Unauthorized!'
            ], 400);
        }

        $user_data = User::where('email', $request->email)->first();

        return response()->json([
            'status' => 200,
            'message' => 'Login authorized!',
            'redirect' => '/api/user/dashboard'
        ]);
    }

    # DOCU: This function will render homepage after successfully login.
    public function dashboard(){
        return view('home');
    }
}
