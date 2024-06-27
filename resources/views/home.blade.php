@extends('layouts.app')
@section('title', 'Home')
@section('content')

    <div class="jumbotron">
        <h1 class="display-4">Welcome To Home Page</h1>
        <a class="btn btn-primary btn-lg" role="button" href="{{ route('books.index') }}">View Books</a>
        <a class="btn btn-success btn-lg" role="button" href="{{ route('books.create') }}">Create Book</a>
    </div>

@endsection

