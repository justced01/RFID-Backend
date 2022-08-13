@extends('layouts.content') 
@section('title') {{'Login'}} @endsection

@section('content') 
    <p>{{ session('message') }}</p>
    @if($errors->any()) 
        @foreach($errors->all() as $error) 
        <p>{{ $error }}</p>
        @endforeach
    @endif
    <form action="/api/users/login" method="post">
        @csrf 
        Email: <input type="text" name="email" id="">
        Password: <input type="password" name="password" id="">
        <input type="submit" value="Login">
    </form>
    <p>Don't have an account yet?<a href="/api/users/new"> Register here.</a></p>
@endsection
