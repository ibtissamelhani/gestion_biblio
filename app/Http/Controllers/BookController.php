<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    public function index(){
        $books =Book::all();
        $userAuth = Auth::User();

        return view('admin.book.index', compact('books','userAuth'));
    }

    public function store(Request $request){ 
        $validatedData = $request->validate([
            'title' => ['required'],
            'author' => ['required'],
            'genre' => ['required'],
            'publication_year' => ['required', 'numeric'],
            'total_copies' => ['required', 'numeric'],
            'available_copies' => ['required', 'numeric'],
            'description' => ['required']
        ]);
        
        $book = Book::create($request->all());
        return redirect()->route('books.index');
    }

    public function show(Book $book)
    {
        $userAuth = Auth::User();
        return view('user.show', compact('book','userAuth'));
    }

    public function edit(Book $book)
    {
        $userAuth = Auth::user();
        return view('admin.book.edit', compact('book','userAuth'));
    }

    public function update(Request $request, Book $book)
    {
        $book->update($request->all());
        return redirect()->route('books.index');
    }
   
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index');
    }

}
