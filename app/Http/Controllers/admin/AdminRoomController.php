<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;

use App\Models\Rooms;
use Illuminate\Http\Request;

class AdminRoomController extends Controller
{

    public function index()
    {
        $rooms = Rooms::all();
        return view('admin.room', compact('rooms'));
    }

    public function create(){

        return view('admin.RoomCreate');

    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'required',
            'price' => 'required',
            'quantity' => 'required',
        ]);
        $rooms = new Rooms();
        $rooms->name = $request->input('name');

        // Handle the image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $rooms->image = 'images/' . $imageName;

        }

        $rooms->quantity = $request->input('quantity');
        $rooms->description = $request->input('description');
        $rooms->price = $request->input('price');
        $rooms->save();

        return redirect('/admin/room');
    }

    public function edit($id)
    {
        $room = Rooms::findOrFail($id);
        return view('admin.RoomEdit', compact('room'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'required',
            'price' => 'required|numeric',
        ]);
        $id = $request->input('id');
        $room = Rooms::findOrFail($id);
        $room->name = $request->input('name');
        $room->description = $request->input('description');
        $room->price = $request->input('price');

        if ($request->hasFile('image')) {
            // Delete the old image if necessary
            if ($room->image && file_exists(public_path($room->image))) {
                unlink(public_path($room->image));
            }

            // Store the new image
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $room->image = 'images/' . $imageName;
        }

        $room->save();

        return redirect('/admin/room');
    }

    public function destroy($id)
    {
        $room = Rooms::findOrFail($id);
        if($room){
            $room->delete();
        }

        return redirect('/admin/room');
    }

}
