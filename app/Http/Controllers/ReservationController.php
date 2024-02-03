<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    public function index(){
        $reservations =Reservation::all();
        $user = Auth::User();

        return view('admin.reservation.index', compact('reservations','user'));
    }

    public function store(Request $request){ 
        $validatedData = $request->validate([
            'reservation_date'=> ['required'],
            'return_date'=> ['required'],
        ]);
        $reservation = Reservation::create($request->all());
        $book = $reservation->book;
        $user = Auth::User();
        return view('user.show', compact('book','user'));
    }


    public function edit(Reservation $reservation)
    {
        $user = Auth::User();
        return view('admin.reservation.edit', compact('reservation','user'));
    }

    public function update(Request $request, Reservation $reservation)
    {
        $reservation->update($request->all());
        return redirect()->route('reservations.index');
    }

    public function destroy(Reservation $reservation)
    {
        $reservation->delete();
        return redirect()->route('reservations.index');
    }
}
