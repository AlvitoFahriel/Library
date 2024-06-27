@extends('layouts.app')
@section('title', 'Books List')
@section('content')

    <h1>Book List</h1>
    <a href="{{ route('books.create') }}" class="btn btn-success mb-3">Add new book</a>
    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Author</th>
                <th>Page</th>
                <th>Action</th>
            </tr>
        </thead>
        <thead>
            @foreach ($books as $book)
                <tr>
                    <td>{{ $book->id }}</td>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->author }}</td>
                    <td>{{ $book->page }}</td>
                    <td>
                        <a href="{{ route('books.edit', $book->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('books.destroy', $book->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </thead>
    </table>

@endsection
