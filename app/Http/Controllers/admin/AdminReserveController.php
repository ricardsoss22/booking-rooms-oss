<?php

namespace App\Http\Controllers\admin;

use App\Models\Reserve;

class AdminReserveController
{

    public function index()
    {
        $reservations = Reserve::with('room')->get();
        return view('admin.reserve', compact('reservations'));
    }

    public function accept($id)
    {
        $reservation = Reserve::findOrFail($id);
        $reservation->status = 'accepted';
        $reservation->save();

        return redirect('/admin/reserve');
    }

    public function decline($id)
    {
        $reservation = Reserve::findOrFail($id);
        if($reservation){
            $reservation->delete();
        }


        return redirect('/admin/reserve');
    }
}
