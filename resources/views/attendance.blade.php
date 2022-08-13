@extends('layouts.content') 
@section('title') {{'Attendance'}} @endsection

@section('content') 
    <nav>
        <a href="/api/users/dashboard">Dashboard</a>
    </nav>
    <h1>Attendance</h1>
    <form action="/api/users/time_in" method="post">
        <button type="submit">Time Out</button>
    </form>
    <form action="/api/users/time_out" method="post">
        <button type="submit">Time In</button>
    </form>
@endsection
