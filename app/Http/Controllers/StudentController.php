<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    # DOCU: This function will store the user input data from registration form
    public function create(Request $request){
        $request->validate([
            'user_id' => 'required',
            'first_name' => 'required|string|min:3',
            'middle_name' => 'required|string|min:3',
            'last_name' => 'required|string|min:3',
            'profile_pic' => 'required|string'
        ]);

        Student::create([
            'user_id' => $request->user_id,
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'last_name' => $request->last_name,
            'profile_path' => $request->profile_pic
        ]);

        return response()->json([
            'status' => 200,
            'message' => 'Student successfully added!',
        ]);
    }
}
