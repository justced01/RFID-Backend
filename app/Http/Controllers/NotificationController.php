<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notification;

class NotificationController extends Controller
{
    public function show(){
        return response()->json([
            'status' => 200,
            'data' => Notification::all(),
            'message' => 'All attendance record were retrieved'
        ]);
    }
}
