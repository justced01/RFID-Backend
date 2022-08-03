@extends('layouts.content') 
@section('title') {{'Login'}} @endsection

@section('content') 
    <p>{{ session('message') }}</p>
    <form action="/api/user/login" method="post">
        @csrf 
        Email: <input type="text" name="email" id="">
        Password: <input type="password" name="password" id="">
        <input type="submit" value="Login">
    </form>
    @if($errors->any()) 
    <ul>
        @foreach($errors->all() as $error) 
        <li>{{ $error }}</li>
        @endforeach
    </ul>
    @endif
@endsection
