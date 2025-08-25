<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    // Ambil semua event
    public function index()
    {
        return response()->json(Event::all());
    }

    public function edit($id)
    {
        $event = Event::findOrFail($id);
        return view('events.edit', compact('event'));
    }


    // Tambah event baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'desc'  => 'required|string',
            'date'  => 'required|date', // lebih tepat pakai date
            'img'   => 'required|image|mimes:jpeg,png,jpg,gif|max:10048',
        ]);

        // simpan file ke storage/app/public/events
        $path = $request->file('img')->store('events', 'public');

        // simpan data ke database
        $event = Event::create([
            'title' => $validated['title'],
            'desc'  => $validated['desc'],
            'date'  => $validated['date'],
            'img'   => $path, // simpan path gambar
        ]);

        return redirect()
            ->route('index.index')
            ->with('success', 'Event berhasil dibuat!');
    }


    // Detail 1 event
    public function show(Event $event)
    {
        return response()->json($event);
    }

    // Update event
    public function update(Request $request, Event $event)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'desc'  => 'required|string',
            'date'  => 'required|date',
            'img'   => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10048',
        ]);

        // Kalau ada file gambar baru
        if ($request->hasFile('img')) {
            // hapus gambar lama
            if ($event->img && Storage::disk('public')->exists($event->img)) {
                Storage::disk('public')->delete($event->img);
            }

            // simpan gambar baru
            $path = $request->file('img')->store('events', 'public');
            $validated['img'] = $path;
        } else {
            // kalau gak ada gambar baru, tetep pakai yang lama
            $validated['img'] = $event->img;
        }

        // update data event
        $event->update($validated);

        return redirect()
            ->route('index.index')
            ->with('success', 'Event berhasil diperbarui!');
    }

    // Hapus event
    public function destroy(Event $event)
    {
        // hapus file gambar kalau ada
        if ($event->img && Storage::disk('public')->exists($event->img)) {
            Storage::disk('public')->delete($event->img);
        }

        $event->delete();

        return redirect()->route('index.index')
            ->with('success', 'Event berhasil dihapus!');
    }
}
