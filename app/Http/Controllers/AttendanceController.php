<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;
use Carbon\Carbon;

class AttendanceController extends Controller
{
    public function time_in(Request $request){
        Attendance::create([
            'student_name' => $request->student_name,
            'parent_name' => $request->parent_name,
            'time_in' => Carbon::now(),
            'time_out' => Carbon::now(),
            'date' => Carbon::now(),
            'rfid' => '000000000',
            'date' => Carbon::now(),
        ]);

        return response()->json([
            'status' => 200,
            'message' => 'User successfully clock in'
        ]);
    }

    public function showAll(){
        return response()->json([
            'status' => 200,
            'data' => Attendance::all(),
            'message' => 'All attendance record were retrieved'
        ]);
    }
}
