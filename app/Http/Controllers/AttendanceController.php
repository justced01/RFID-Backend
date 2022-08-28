<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Attendance;
use App\Models\User;
use Carbon\Carbon;

class AttendanceController extends Controller
{
    public function time_in(Request $request){
        Attendance::create([
            'student_id' => 3,
            'time_in' => Carbon::now(),
            'time_out' => Carbon::now(),
            'date' => Carbon::now(),
            'rfid' => '000000000',
            'temperature' => '36.2',
        ]);

        return response()->json([
            'status' => 200,
            'message' => 'User successfully clock in'
        ]);
    }

    public function showAll(){
        return response()->json([
            'status' => 200,
            'data' => User::select("attendances.id AS attendance_id", DB::raw("CONCAT(users.first_name, ' ', users.last_name) AS parent_name"), DB::raw("CONCAT(students.first_name, ' ', students.last_name) AS student_name"), "attendances.time_in", "attendances.time_out", "attendances.date", "attendances.rfid")
                        ->join('students', 'users.id', '=', 'students.user_id')
                        ->join('attendances', 'students.id', '=', 'attendances.student_id')
                        ->get(),
            'message' => 'All attendance record were retrieved'
        ]);
    }

    public function getStudentLogs(Request $request){
        return response()->json([
            'status' => 200,
            'data' => User::select('users.id AS parent_id', 'attendances.id AS attendance_id', 'students.id AS student_id', 'students.first_name AS student_name', 'attendances.time_in', 'attendances.time_out', 'attendances.date', 'attendances.temperature')
                        ->join('students', 'users.id', '=', 'students.user_id')
                        ->join('attendances', 'students.id', '=', 'attendances.student_id')
                        ->where('users.id', $request->user()->id)
                        ->get(),
            'message' => 'All attendance record were retrieved'
        ]);
    }

    public function getLatestStudentLog(Request $request){
        return response()->json([
            'status' => 200,
            'data' => User::select('users.id AS parent_id', 'attendances.id AS attendance_id', 'students.id AS student_id', 'students.first_name AS student_name', 'attendances.time_in', 'attendances.time_out', 'attendances.date', 'attendances.temperature', 'students.profile_path')
                        ->join('students', 'users.id', '=', 'students.user_id')
                        ->join('attendances', 'students.id', '=', 'attendances.student_id')
                        ->where('users.id', $request->user()->id)
                        ->latest('attendances.created_at')
                        ->first(),
            'message' => 'All attendance record were retrieved'
        ]);
    }
}
