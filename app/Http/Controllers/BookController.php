<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(){
        $books =Book::all();
        return view('admin.book.index', compact('books'));
    }

    public function store(Request $request){ 
        $book = Book::create($request->all());
        return redirect()->route('books.index');
    }
}
