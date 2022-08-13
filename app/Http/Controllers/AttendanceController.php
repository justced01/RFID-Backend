<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;
use App\Models\User;

class AttendanceController extends Controller
{
    // DOCU: This function will render the attendance page
    public function index(){
        return view('attendance');
    }

    // DOCU: Time in
    public function clockIn($id){
        if(User::where('id', $id)->exists()){
            $attendance = Attendance::create([
                'user_id' => $id,
                'status' => 'Clock in',
                // 'location' => in what gate user tapped
            ]);
    
            return response()->json([
                'status' => 200,
                'user_data' => User::find($id),
                'current_date' => $attendance->created_at, 
                'message' => 'User successfully clock in'
            ]);
        }
        else {
            return response()->json([
                'status' => 301,
                'message' => 'User not found'
            ]);
        }
    }

    // DOCU: Time out
    public function clockOut($id){
        if(User::where('id', $id)->exists()){
            $attendance = Attendance::create([
                'user_id' => $id,
                'status' => 'Clock out',
                // 'location' => in what gate user tapped
            ]);
    
            return response()->json([
                'status' => 200,
                'user_data' => User::find($id),
                'current_date' => $attendance->created_at, 
                'message' => 'User successfully clock out'
            ]);
        }
        else {
            return response()->json([
                'status' => 404,
                'message' => 'User not found'
            ]);
        }
    }

    // DOCU: This function will retrieved all user records in attendance table
    public function showAll($id){
        return response()->json([
            'status' => 200,
            'data' => Attendance::where('user_id', $id)->all()->sortByDesc('created_at'),
            'message' => 'All attendance record were retrieved'
        ])
    }
}      
