<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class adminController extends Controller
{
    public function index(){
        $books =Book::all();
        $reservations =Reservation::all();
        $users =User::all();
        $user = Auth::User();
        return view('admin.dashboard', compact('books','reservations','users','user'));
    }
}
