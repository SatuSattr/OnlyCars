<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    // Ambil semua event
    public function index()
    {
        return response()->json(Event::all());
    }

    // Tambah event baru
    public function store(Request $request)
    {
        $event = Event::create($request->validate([
            'title' => 'required|string|max:255',
            'desc'  => 'required|string',
            'date'  => 'required|string',
            'img'   => 'required|string',
        ]));

        return response()->json($event, 201);
    }

    // Detail 1 event
    public function show(Event $event)
    {
        return response()->json($event);
    }

    // Update event
    public function update(Request $request, Event $event)
    {
        $event->update($request->validate([
            'title' => 'required|string|max:255',
            'desc'  => 'required|string',
            'date'  => 'required|string',
            'img'   => 'required|string',
        ]));

        return response()->json($event);
    }

    // Hapus event
    public function destroy(Event $event)
    {
        $event->delete();
        return response()->json(null, 204);
    }
}
