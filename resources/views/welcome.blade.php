@extends('layouts.app')
@section('title', 'Welcome')
@section('content')

<div class="jumbotron">
    <h1 class="display-4">Welcome to Our Library</h1>
    <p class="lead">This is a simple library management system.</p>
    <hr class="my-4">
    <p>Please login or register to continue.</p>
    <a class="btn btn-primary btn-lg" href="{{ route('login') }}" role="button">Login</a>
    <a class="btn btn-success btn-lg" href="{{ route('register') }}" role="button">Register</a>
</div>

@endsection
