<?php

namespace App\Http\Controllers;

 use App\Models\Room;
 use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index(){
        $rooms = Room::latest()->get();
        return view('rooms.index',compact('rooms'));
    }

    public function create(){
        return view('rooms.create');
    }

    public function store(Request $request){
        $request->validate([
            'nama_ruangan'=>'required|string|max:255',
            'kapasitas'=> 'required|integer|min:1',
            'deskripsi'=>'nullable|string',
            'status'=>'required|in:tersedia,penuh',
        ]);

        Room::create($request->all());
        return redirect()->route('rooms.index')->with('success','Data ruanagan berhasil ditambahkan');
    }

    public function show(Room $room){
        return view('rooms.show', compact('room'));
    }

    public function  edit(Room $room){
        return view('rooms.edit', compact('room'));
    }

    public function update(Request $request, Room $room){
        $request->validate([
            'nama_ruangan'=>'required|string|max:255',
            'kapasitas'=>'required|integer|min:1',
            'deskripsi'=>'nullable|string',
            'status'=>'required|in:tersedia,penuh',
        ]);

        $room->update($request->all());
        return redirect()->route('rooms.index')->with('success','Data ruanagan berhasil diperbarui');
    }

    public function destroy(Room $room){
        $room->delete();
        return redirect()->route('rooms.index')->with('success','Data ruangan berhasil dihapus.');
    }
}