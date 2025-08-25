<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    // Tampilkan semua gallery
    public function index()
    {
        return redirect()->route('index.index');
    }

    // Tampilkan form create
    public function create()
    {
        return view('galleries.create');
    }

    // Simpan gallery baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'url'   => 'required|image|mimes:jpeg,png,jpg,gif|max:10048', // <-- pakai url
        ]);

        // simpan file
        $path = $request->file('url')->store('gallery', 'public');

        $gallery = Gallery::create([
            'title' => $validated['title'],
            'url'   => $path,
        ]);

        return redirect()->route('index.index')->with('success', 'Gambar berhasil ditambahkan!');
    }



    // Detail 1 data
    public function show(Gallery $gallery)
    {
        return view('galleries.show', compact('gallery'));
    }

    // Tampilkan form edit
    public function edit(Gallery $gallery)
    {
        return view('galleries.edit', compact('gallery'));
    }

    // Update data gallery
    public function update(Request $request, Gallery $gallery)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'url'   => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:10048'
        ]);

        $data = ['title' => $request->title];

        // Kalau ada file baru, hapus lama + upload baru
        if ($request->hasFile('url')) {
            if ($gallery->url && Storage::disk('public')->exists($gallery->url)) {
                Storage::disk('public')->delete($gallery->url);
            }
            $data['url'] = $request->file('url')->store('gallery', 'public');
        }

        $gallery->update($data);

        return redirect()->route('index.index')->with('success', 'Gallery berhasil diupdate!');
    }

    // Hapus data + file
    public function destroy(Gallery $gallery)
    {
        if ($gallery->url && Storage::disk('public')->exists($gallery->url)) {
            Storage::disk('public')->delete($gallery->url);
        }
        $gallery->delete();

        return redirect()->route('index.index')->with('success', 'Gallery berhasil dihapus!');
    }
}
