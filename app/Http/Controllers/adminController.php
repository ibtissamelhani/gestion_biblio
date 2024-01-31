<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Http\Request;

class adminController extends Controller
{
    public function index(){
        $books =Book::all();
        $reservations =Reservation::all();
        $users =User::all();
        return view('admin.dashboard', compact('books','reservations','users'));
    }
}
