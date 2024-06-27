<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = DB::table('books')->get();
        return view('books.index', ['books' => $books]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => ['required', 'string', 'max:255', 'regex:/^[a-zA-Z\s]+$/'],
            'page' => 'required|integer|min:1',
        ],  [
            'title.required' => 'Title is required',
            'title.string' => 'Title must be a string',
            'title.max' => 'Title cannot exceed 255 characters',
            'author.required' => 'Author is required',
            'author.string' => 'Author must be a string',
            'author.max' => 'Author cannot exceed 255 characters',
            'author.regex' => 'Author name cannot contain numbers or special characters',
            'page.required' => 'Page is required',
            'page.integer' => 'Page must be an integer',
            'page.min' => 'Page must be at least 1',
        ]);

        DB::table('books')->insert([
            'title' => $request->title,
            'author' => $request->author,
            'page' => $request->page,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('books.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $book = Book::findOrFail($id);
        return view('books.edit', ['book' => $book]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => ['required', 'string', 'max:255', 'regex:/^[a-zA-Z\s]+$/'],
            'page' => 'required|integer|min:1',
        ], [
            'title.required' => 'Title is required',
            'title.string' => 'Title must be a string',
            'title.max' => 'Title cannot exceed 255 characters',
            'author.required' => 'Author is required',
            'author.string' => 'Author must be a string',
            'author.max' => 'Author cannot exceed 255 characters',
            'author.regex' => 'Author name cannot contain numbers or special characters',
            'page.required' => 'Page is required',
            'page.integer' => 'Page must be an integer',
            'page.min' => 'Page must be at least 1',
        ]);
        $book = Book::findOrFail($id);
        $book->update($request->all());

        return redirect()->route('books.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        $book->delete();

        return redirect()->route('books.index');
    }
}
