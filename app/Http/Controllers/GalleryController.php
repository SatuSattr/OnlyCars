<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    // ambil semua gambar
    public function index()
    {
        return response()->json(Gallery::all());
    }

    // tambah gambar
    public function store(Request $request)
    {
        $gallery = Gallery::create($request->validate([
            'url' => 'required|string|max:255',
        ]));

        return response()->json($gallery, 201);
    }

    // detail gambar
    public function show(Gallery $gallery)
    {
        return response()->json($gallery);
    }

    // update gambar
    public function update(Request $request, Gallery $gallery)
    {
        $gallery->update($request->validate([
            'url' => 'required|string|max:255',
        ]));

        return response()->json($gallery);
    }

    // hapus gambar
    public function destroy(Gallery $gallery)
    {
        $gallery->delete();
        return response()->json(null, 204);
    }
}
