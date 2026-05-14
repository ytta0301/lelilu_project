<?php

namespace App\Http\Controllers;

use App\Models\Testimoni;
use Illuminate\Http\Request;

class AdminTestimoniController extends Controller
{
    public function index()
    {
        $testimonis = Testimoni::oldest()->get();

        return view('admin.testimoni', compact('testimonis'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama'          => 'required|string|max:255',
            'isi_testimoni' => 'required|string',
        ]);

        $testimoni = Testimoni::create($validated);

        return response()->json($testimoni, 201);
    }

    public function update(Request $request, $id)
    {
        $testimoni = Testimoni::findOrFail($id);

        $validated = $request->validate([
            'nama'          => 'required|string|max:255',
            'isi_testimoni' => 'required|string',
        ]);

        $testimoni->update($validated);

        return response()->json($testimoni);
    }

    public function destroy($id)
    {
        $testimoni = Testimoni::findOrFail($id);
        $testimoni->delete();

        return response()->json(['message' => 'Testimoni deleted successfully']);
    }
}
