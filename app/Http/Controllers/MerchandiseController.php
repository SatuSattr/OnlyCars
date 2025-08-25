<?php

namespace App\Http\Controllers;

use App\Models\Merchandise;
use Illuminate\Http\Request;

class MerchandiseController extends Controller
{
    public function index()
    {
        return response()->json(Merchandise::all());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'   => 'required|string|max:255',
            'img'    => 'nullable|string|max:255',
            'desc'   => 'nullable|string',
            'price'  => 'required|numeric',
            'rating' => 'nullable|integer|min:1|max:5',
        ]);

        $merch = Merchandise::create($data);
        return response()->json($merch, 201);
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
            'img'    => 'sometimes|string|max:255',
            'desc'   => 'sometimes|string',
            'price'  => 'sometimes|numeric',
            'rating' => 'sometimes|integer|min:1|max:5',
        ]);

        $merch->update($data);
        return response()->json($merch);
    }

    public function destroy($id)
    {
        $merch = Merchandise::findOrFail($id);
        $merch->delete();

        return redirect()->route('index.index');
    }
}
