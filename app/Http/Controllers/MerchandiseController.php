<?php

namespace App\Http\Controllers;

use App\Models\Merchandise;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MerchandiseController extends Controller
{
    public function index()
    {
        return response()->json(Merchandise::all());
    }


    // Tampilkan form create
    public function create()
    {
        return view('merch.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'   => 'required|string|max:255',
            'img'    => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:10048',
            'desc'   => 'nullable|string',
            'price'  => 'required|numeric',
            'rating' => 'nullable|integer|min:0|max:5',
        ]);

        // Simpan file jika ada
        if ($request->hasFile('img')) {
            $data['img'] = $request->file('img')->store('merch', 'public');
        }

        $merch = Merchandise::create($data);

        return redirect()->route('index.index')->with('success', 'Merch berhasil ditambahkan!');
    }

    public function show($id)
    {
        return response()->json(Merchandise::findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $merch = Merchandise::findOrFail($id);

        $data = $request->validate([
            'name'   => 'sometimes|string|max:255',
            'img'    => 'sometimes|image|mimes:jpeg,png,jpg,gif,webp|max:10048',
            'desc'   => 'sometimes|string',
            'price'  => 'sometimes|numeric',
            'rating' => 'sometimes|integer|min:0|max:5',
        ]);

        // Kalau ada file baru, hapus file lama dan simpan baru
        if ($request->hasFile('img')) {
            if ($merch->img && Storage::disk('public')->exists($merch->img)) {
                Storage::disk('public')->delete($merch->img);
            }
            $data['img'] = $request->file('img')->store('merch', 'public');
        }

        $merch->update($data);

        return redirect()->route('index.index')->with('success', 'Merch berhasil diupdate!');
    }

    public function destroy($id)
    {
        $merch = Merchandise::findOrFail($id);

        // Hapus file lama kalau ada
        if ($merch->img && Storage::disk('public')->exists($merch->img)) {
            Storage::disk('public')->delete($merch->img);
        }

        $merch->delete();

        return redirect()->route('index.index')->with('success', 'Merch berhasil dihapus!');
    }
}
