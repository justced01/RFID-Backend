<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use App\Models\User;

class UserController extends Controller
{
    # DOCU: This function will render the login page.
    public function index(){
        return view('users.login');
    }

    # DOCU: This function will render the the registration page.
    public function register(){
        return view('users.register');
    }

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
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email',
            'password' => 'required|string'
        ]);

        if($validator->fails()) {
            return response()->json([
                'status' => 301,
                'message' => 'Login unauthorized!',
                'data' => $validator->errors()
            ]);
        }

        $credentials = request(['email', 'password']);

        if(!Auth::attempt($credentials)){
            return response()->json([
                'status' => 301,
                'message' => 'Login unauthorized! Email or password incorrect!'
            ]);
        }

        // Notes: 
        // Bearer Token
        // User log
        $user = $request->user();
        $tokenResult = auth()->user()->createToken('LaravelAuthApp');
        $token = $tokenResult->token;

        $user_data = User::where('email', $request->email)->first();

        if($user_data->role === 1){
            return response()->json([
                'status' => 200,
                'message' => 'Welcome Super Admin user!',
                'user_data' => ['first_name' => $user_data->first_name, 'user_id' => $user_data->id],
                'redirect' => '/api/user/sadmin/dashboard',
                'access_token' => $tokenResult->accessToken,
                'token_type' => 'Bearer',
                'expires_at' => Carbon::parse(
                    $tokenResult->token->expires_at
                )->toDateTimeString(),
            ]);
        } elseif ($user_data->role === 2){
            return response()->json([
                'status' => 200,
                'message' => 'Welcome Admin user!',
                'user_data' => ['first_name' => $user_data->first_name, 'user_id' => $user_data->id],
                'redirect' => '/api/user/admin/dashboard',
                'access_token' => $tokenResult->accessToken,
                'token_type' => 'Bearer',
                'expires_at' => Carbon::parse(
                    $tokenResult->token->expires_at
                )->toDateTimeString(),
            ]);
        } elseif ($user_data->role === 3){
            return response()->json([
                'status' => 200,
                'message' => 'Welcome user!',
                'user_data' => ['first_name' => $user_data->first_name, 'user_id' => $user_data->id],
                'redirect' => '/api/user/dashboard',
                'access_token' => $tokenResult->accessToken,
                'token_type' => 'Bearer',
                'expires_at' => Carbon::parse(
                    $tokenResult->token->expires_at
                )->toDateTimeString(),
            ]);
        }
    }

    # DOCU: This function will update the user data in users table
    public function update($id, Request $request){
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|min:3',
            'middle_name' => 'required|string|min:3',
            'last_name' => 'required|string|min:3',
            'email' => 'required|string|email',
            'password' => 'required|string'
        ]);

        if($validator->fails()) {
            return response()->json([
                'status' => 301,
                'message' => 'Update user unauthorized!',
                'data' => $validator->errors()
            ]);
        }
        else {
            User::where('id', $id)->update([
                'first_name' => $request->first_name,
                'middle_name' => $request->middle_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'password' => bcrypt($request->input('password'))
            ]);
            
            return response()->json([
                'status' => 200,
                'message' => 'Account successfully updated!',
                'redirect' => '/api/users/new'
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

        // return redirect('/api/users/new')->with('message', 'Successfully created a new user.');
    }

    #DOCU: This function will logout and destroy the session
    public function logout(){
        Session::flush();
        Auth::logout();
  
        return redirect('/api/users');
    }
}

