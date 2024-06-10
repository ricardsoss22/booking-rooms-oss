<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\feedback;
use App\Models\Reserve;
use App\Models\Rooms;
use Illuminate\Http\Request;

class ReserveController extends Controller
{
    public function index()
    {

        $reservations = Reserve::where('user_id', auth()->user()->id)->get(); // Assuming a User hasMany Reservations relationship
        return view('user.reserve', compact('reservations'));
    }

    public function edit($id)
    {
        $reservation = Reserve::findOrFail($id);
        return view('user.EditReserve', compact('reservation'));
    }

    public function update(Request $request, Reserve $reservation)
    {
        // Ensure the user owns the reservation


        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'start_date' => 'required|date|after:today',
            'end_date' => 'required|date|after:start_date',
            'room_quantity' => 'required|integer|min:1|max:' . $reservation->room->quantity + $reservation->room_quantity,
        ]);

        $reservation->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'start_date' => $request->input('start_date'),
            'end_date' => $request->input('end_date'),
            'room_quantity' => $request->input('room_quantity'),
        ]);

        // Adjust the room quantity
        $reservation->room->quantity += $reservation->room_quantity;
        $reservation->room->quantity -= $request->input('room_quantity');
        $reservation->room->save();

        return redirect('/reserve');
    }

    public function destroy($id)
    {
        $reserve = Reserve::findOrFail($id);
        $room = Rooms::findOrFail($reserve->room_id);

        // Increase the room quantity by the number of rooms that were reserved
        $room->quantity += $reserve->room_quantity;
        $room->save();

        $reserve->delete();

        return redirect('/room');
    }

    public function feedback(Request $request, $room_id)
    {
        $request->validate([
            'feedback' => 'required|string',
        ]);
        $feedback = new feedback();
        $feedback->feedback = $request->input('feedback');
        $feedback->room_id = $room_id;
        $feedback->save();

        $reserve = Reserve::findOrFail($request->input('reservation_id'));
        $reserve->status = 'visited';
        $reserve->save();

        return redirect('/reserve');
    }



}
