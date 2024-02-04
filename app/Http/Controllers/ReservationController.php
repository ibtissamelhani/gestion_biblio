<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ReservationController extends Controller
{
    public function index(){
        // $reservations = Reservation::with('user')->get();

        $reservations =Reservation::all();
        $userAuth = Auth::user();

        return view('admin.reservation.index', compact('reservations','userAuth'));
    }

    public function store(Request $request){ 
        $validatedData = $request->validate([
            'reservation_date'=> ['required'],
            'return_date'=> ['required'],
        ]);
        DB::beginTransaction();
            try{
            $reservation = Reservation::create($request->all());
            $book = $reservation->book;
            $book->decrement('available_copies');
            $userAuth = Auth::user();
            DB::commit();
            return view('user.show', compact('book','userAuth'));

        }
        catch(Exception $e){
            DB::rollBack();
        }
        
    }


    public function edit(Reservation $reservation)
    {
        $userAuth = Auth::user();
        return view('admin.reservation.edit', compact('reservation','userAuth'));
    }

    public function update(Request $request, Reservation $reservation)
{
    $data = $request->all();

    if ($data['status'] === 'returned') {
        $data['is_returnd'] = true;
    } else {
        $data['is_returnd'] = false;
    }

    $reservation->update($data);

    return redirect()->route('reservations.index');
}


    public function destroy(Reservation $reservation)
    {
        $reservation->delete();
        return redirect()->route('reservations.index');
    }
}
