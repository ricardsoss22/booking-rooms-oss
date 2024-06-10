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
        $room = Rooms::findOrFail($id);
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
        $reserve->name = $request->input('name');
        $reserve->email = $request->input('email');
        $reserve->phone = $request->input('phone');
        $reserve->room_id = $id;
        $reserve->user_id = $request->input('user_id');
        $reserve->start_date = $request->input('start_date');
        $reserve->end_date = $request->input('end_date');
        $reserve->room_quantity = $request->input('room_quantity');
        $reserve->save();

        $room = Rooms::find($reserve->room_id);
        $room->quantity = $room->quantity - $request->input('room_quantity');
        $room->save();
        return redirect('/room');
    }


}
