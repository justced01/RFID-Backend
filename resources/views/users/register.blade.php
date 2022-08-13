@extends('layouts.content') 
@section('title') {{'Register'}} @endsection

@section('content') 
    <p>{{ session('message') }}</p>
    @if($errors->any()) 
        @foreach($errors->all() as $error) 
        <p>{{ $error }}</p>
        @endforeach
    @endif
    <form action="/api/users/create" method="post">
        @csrf 
        First Name: <input type="text" name="first_name" id="">
        Middle Name: <input type="text" name="middle_name" id="">
        Last Name: <input type="text" name="last_name" id="">
        Email: <input type="text" name="email" id="">
        Password: <input type="password" name="password" id="">
        Confirm Password: <input type="password" name="password_confirmation" id="">
        <input type="submit" value="Register">
    </form>
    <p>Already registered?<a href="/api/users"> Login here.</a></p>
@endsection
