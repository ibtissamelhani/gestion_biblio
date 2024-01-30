<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function bookList(){
        return view('admin.book.liste');
    }
}
