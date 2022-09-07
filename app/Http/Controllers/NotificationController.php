<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notification;

class NotificationController extends Controller
{
    # DOCU: This function will store the user input data from registration form
    public function create(Request $request){
        Notification::create([
            'user_id' => 2,
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status,
        ]);

        return response()->json([
            'status' => 200,
            'message' => 'Notification successfully added!',
        ]);
    }

    public function findUserNotif(Request $request){
        return response()->json([
            'status' => 200,
            'data' => Notification::select('notifications.*', 'students.profile_path', 'students.first_name as student_name')
                        ->join('users', 'users.id', '=', 'notifications.user_id')
                        ->join('students', 'students.user_id', '=', 'users.id')
                        ->where('users.id', $request->user()->id)
                        ->orderBy('notifications.created_at', 'desc')
                        ->get(),
            'message' => 'Notification successfully retrieved!',
        ]);
    }
}
