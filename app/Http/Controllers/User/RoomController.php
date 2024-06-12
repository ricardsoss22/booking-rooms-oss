<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Reserve;
use App\Models\Rooms;
use Illuminate\Http\Request;


class RoomController extends Controller
{
    public function index(){

        $rooms = Rooms::all();
        return view('user.room', compact('rooms'));
    }

    public function show($id){
        $room = Rooms::find($id);
        return view('user.show', compact('room'));
    }

    public function store(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'start_date' => 'required|date|after:today',
            'end_date' => 'required|date|after:start_date',
        ]);

        $reserve = new Reserve();
        if ($reserve->exists()) {
            return redirect('/room')->with('error', 'You have already reserved a room.');
        }

        Reserve::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'room_id' => $id,
            'user_id' => $request->input('user_id'),
            'start_date' => $request->input('start_date'),
            'end_date' => $request->input('end_date'),
            'room_quantity' => $request->input('room_quantity'),
        ]);

        $room = Rooms::find($reserve->room_id);
        $room->quantity = $room->quantity - $request->input('room_quantity');
        $room->save();
        return redirect('/room');
    }


}
