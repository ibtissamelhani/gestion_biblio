<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    public function index(){
        $users =User::all();
        $userAuth = Auth::User();
        return view('admin.user.index', compact('users','userAuth'));
    }

    public function home(){
        $books = Book::all();
        $userAuth = Auth::User();
        return view('user.home', compact('books','userAuth'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', Password::defaults()],
        ]);

        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        
        return redirect()->route('users.index');

    }

    public function edit(User $user)
    {
        $roles = Role::all();
        $userAuth = Auth::user();
        return view('admin.user.edit', compact('user','roles','userAuth'));
    }

    public function update(Request $request, User $user)
    {
        $user->update($request->all());
        return redirect()->route('users.index');
    }

    public function destroy(User $user)
        {
            $user->delete();
            return redirect()->route('users.index');
        }
        // get user's reservations 
    public function getUserReservations()
    {
        $userAuth = Auth::user();
    
        $reservations = $userAuth->reservations;
    
        return view('user.reservations', compact('reservations','userAuth'));
    }
}

