@extends('layouts.content') 
@section('title') {{'Dashboard'}} @endsection

@section('content') 
    <nav>
        <a href="/api/users/attendance">Attendance</a>
    </nav>
    <h1>Welcome</h1>
    <form action="/api/users/logout" method="post">
        <input type="submit" value="Logout">
    </form>
@endsection
