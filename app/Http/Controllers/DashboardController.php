<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    # DOCU: This function will render homepage after successfully login.
    public function index(){
        return view('dashboard');
    }
}
