<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index(){
        $books =Book::all();
        $reservations =Reservation::all();
        $users =User::all();
        $userAuth = Auth::User();

        $userCount = User::count();
        $resCount = Reservation::count();
        $bookCount = Book::count();
        return view('admin.dashboard', compact('books','reservations','users','userAuth','bookCount','resCount','userCount'));
    }
}
