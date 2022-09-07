<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Attendance;
use App\Models\Student;
use App\Models\User;
use Carbon\Carbon;

class AttendanceController extends Controller
{
    public function time_in(Request $request){
        Attendance::create([
            'student_id' => 1, // 1 or 3
            'time_in' => Carbon::now(),
            'time_out' => null,
            'date' => Carbon::now(),
            'rfid' => '000000000',
            'temperature' => '36.2',
        ]);

        return response()->json([
            'status' => 200,
            'message' => 'User successfully login'
        ]);
    }

    public function time_out(Request $request){
        Attendance::create([
            'student_id' => 1, // 1 or 3
            'time_in' => null,
            'time_out' => Carbon::now(),
            'date' => Carbon::now(),
            'rfid' => '000000000',
            'temperature' => '36.2',
        ]);

        return response()->json([
            'status' => 200,
            'message' => 'User successfully logout'
        ]);
    }

    # DOCU: This function will get the all students' logs 
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

    # DOCU: This function will get the student/s log based on ID of a parent
    public function getStudentLogs(Request $request){
        return response()->json([
            'status' => 200,
            'data' => User::select('users.id AS parent_id', 'attendances.id AS attendance_id', 'students.id AS student_id', 'attendances.time_in', 'attendances.time_out', 'attendances.date', 'students.profile_path')
                        ->join('students', 'users.id', '=', 'students.user_id')
                        ->join('attendances', 'students.id', '=', 'attendances.student_id')
                        ->where('users.id', $request->user()->id)
                        ->get(),
            'message' => 'Student/s records were retrieved'
        ]);
    }

    # DOCU: This function will get the specific student log based on student ID
    public function findStudentLogs(Request $request){
        return response()->json([
            'status' => 200,
            'data' => Student::select('attendances.id AS attendance_id', 'students.id AS student_id', 'attendances.time_in', 'attendances.time_out', 'attendances.date')
                        ->join('attendances', 'students.id', '=', 'attendances.student_id')
                        ->where('students.id', $request->student_id)
                        ->orderBy('attendances.created_at', 'desc')
                        ->get(),
            'message' => 'Student history were retrieved'
        ]);
    }

    # DOCU: This function will get the latest log of student
    public function getLatestStudentLog(Request $request){
        return response()->json([
            'status' => 200,
            'data' => User::select('users.id AS parent_id', 'attendances.id AS attendance_id', 'students.id AS student_id', 'students.first_name AS student_name', 'attendances.time_in', 'attendances.time_out', 'attendances.date', 'attendances.temperature', 'students.profile_path')
                        ->join('students', 'users.id', '=', 'students.user_id')
                        ->join('attendances', 'students.id', '=', 'attendances.student_id')
                        ->where('users.id', $request->user()->id)
                        ->latest('attendances.created_at')
                        ->first(),
            'message' => 'Latest student record were retrieved'
        ]);
    }
}
